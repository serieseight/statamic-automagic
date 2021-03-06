## Setup

1) Firstly, copy `Automagic` into `site/addons/`.

2) Well, this is awkward... there's no step 2.

## Usage

Inside an email template, use the `{{ automagic }}` tag pair to loop over the available data
from the submission.

#### Parameters

| Name | Description | Example |
|------|-------------|---------|
| `exclude` | A pipe-delimited list of variables to exclude. | `{{ automagic exclude="name\|email" }}` |
| `remove_empty` | Remove empty fields from being output. | `{{ automagic remove_empty="true" }}` |

#### Variables

| Name | Description |
|------|-------------|
| `key` | Formset field key. |
| `value` | Form submission value. |
| `display` | A titlized version of the key for display purposes. |

**Note**: The submission ID and Date are automatically appended.

## Example

**Template**

```html
{{ automagic }}
{{ display }}: {{ value }}
{{ /automagic }}
---
{{ automagic }}
<p>
  <strong>{{ display }}:</strong> {{ value }}
</p>
{{ /automagic }}
```

**Submission Data**

```html
name: Michael Scott
company: Dunder Mifflin
position: Regional Manager
address: 1725 Slough Avenue, Scranton, PA
```

**Output**

```html
Name: Michael Scott
Company: Dunder Mifflin
Position: Regional Manager
Address: 1725 Slough Avenue, Scranton, PA
ID: 1541603055.1894
Date: November 7th, 2018
---
<p>
  <strong>Name:</strong> Michael Scott
</p>
<p>
  <strong>Company:</strong> Dunder Mifflin
</p>
<p>
  <strong>Position:</strong> Regional Manager
</p>
<p>
  <strong>Address:</strong> 1725 Slough Avenue, Scranton, PA
</p>
<p>
  <strong>ID:</strong> 1541603055.1894
</p>
<p>
  <strong>Date:</strong> November 7th, 2018
</p>
```

## Example Templates

- [Basic](https://github.com/serieseight/statamic-automagic/blob/master/examples/basic.html)
- [Full](https://github.com/serieseight/statamic-automagic/blob/master/examples/full.html)

Full template based on [Postmark Transactional Email Templates](https://github.com/wildbit/postmark-templates).
