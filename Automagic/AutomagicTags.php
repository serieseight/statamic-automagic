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
        $data = collect($this->context)
            ->except(['site_url', 'id', 'locale', 'date', 'now', 'today'])
            ->map(function ($value, $key) {
                return $this->prep($value, $key);
            })
            ->values()
            ->push($this->prep($this->context['id'], 'id', 'ID'))
            ->push($this->prep($this->context['date'], 'date'));

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
