Due Date sorting for Kanboard
=============================

Enable sorting columns by due date for Kanboard.

- Preferences are set via new Settings panel
- Button appears at the top of each board to quickly toggle between "due date" and "default" sorting

Screenshots
-----------

### New button at the top of the page

This plugin adds a new "Sorted by...." button to the top of each page in the toolbar.  The button will
show you whether the current sort is "due date" or "board order" (the original way).  Clicking on
the button will take you to the settings panel, where you can change the sorting.

**NOTE:**  This setting affects every board and is stored in your user preferences.

![Toolbar button](https://user-images.githubusercontent.com/11982098/32742491-9b1c975a-c877-11e7-886f-107e73b1d06e.png)

### Settings panel

The settings panel will allow you to change the sorting order.  The current sorting method will be initially
selected by default.  

If you came to this settings panel by clicking on the tool bar button the URL you came from will be shown in the
"Redirect you back to" box.  When you click Save you will be returned to the URL that is shown.

If you arrived at the settings panel without clicking on the tool bar button "No redirection" will be shown and
pressing Save will leave you on the settings page.

![Settings panel](https://user-images.githubusercontent.com/11982098/32742555-c8896fec-c877-11e7-8e2f-9a28eadb3cb0.png)

Author
------

- David Morlitz
- License MIT

Requirements
------------

- Kanboard >= 1.0.40

Installation
------------

You have the choice between 3 methods:

1. Install the plugin from the Kanboard plugin manager in one click
2. Download the zip file and decompress everything under the directory `plugins/DueDate`
3. Clone this repository into the folder `plugins/DueDate`

Note: Plugin folder is case-sensitive.
