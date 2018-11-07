## Setup

1) Firstly, copy `Automagic` into `site/addons/`.

2) Well, this is awkward... there's no step 2.

## Usage

Inside an email template, use the `{{ automagic }}` tag pair to loop over the available data
from the submission.

Available variables:

| Name | Description |
|------|-------------|
| **key** | Formset field key. |
| **value** | Form submission value. |
| **display** | A titlized version of the key for display purposes. |

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
```

## Example Templates

- [Basic](examples/basic.html)
- [Full](examples/full.html)

Full template based on [Postmark Transactional Email Templates](https://github.com/wildbit/postmark-templates).
