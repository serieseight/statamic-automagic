<?php

namespace Statamic\Addons\Automagic;

use Statamic\API\Str;
use Statamic\API\Asset;
use Statamic\Extend\Tags;

class AutomagicTags extends Tags
{
    /**
     * The {{ automagic }} tag
     *
     * @return string
     */
    public function index()
    {
        $exclusions = collect(['site_url', 'locale', 'now', 'today'])
            ->merge(explode('|', $this->get('exclude', '')));

        $data = collect($this->context)
            ->except($exclusions->merge(['id', 'date'])->unique()->toArray())
            ->map(function ($value, $key) {
                return $this->prep($value, $key);
            })
            ->values();

        if (! $exclusions->contains('id')) {
            $data->push($this->prep($this->context['id'], 'id', 'ID'));
        }

        if (! $exclusions->contains('date')) {
            $data->push($this->prep($this->context['date'], 'date'));
        }

        return $this->parseLoop($data);
    }

    protected function prep($value, $key, $display = null)
    {
        $display = $display ?: Str::titleize(Str::deslugify($key));

        if ($asset = Asset::find($value)) {
            $value = $asset->absoluteUrl();
        }

        return compact('display', 'key', 'value');
    }
}
