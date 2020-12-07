# StaticContent

### Display static content simply.

 - Page display from templates.
 - Block display from templates, files, html or text.

### Requirements
Requires Zikula >= 3.0.0

### Notes
As of Zikula Core 3.1.0 this module is included as a Value-Added extension in the Zikula distribution.

## How to use
 - Install the module
 - Add a template to `/templates/p/` like `/templates/p/foo.html.twig`
 - Direct your browser to `/p/foo`

For the blocks, just fill in the form fields. Templates for the blocks can be placed almost anywhere. They are not
as restricted as the use above for full page display. Other blocks are documented in the core.

In Core 3.0.1 you can use the Routes module to create a custom route to the template. So, instead of `/p/foo` you could
use simply `/foo` or `/smile` or anything you like. 

## Changelog
#### 1.0.3
 - Add check for block position existence.
#### 1.0.2
 - Added welcome block on installation
#### 1.0.1
 - added hook for html block
