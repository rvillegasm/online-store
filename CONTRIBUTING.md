# Contribution Guidelines

If you want to make a contribution to the project, 
you MUST follow this set of coding style rules.
If you submit a pull request of some sort, and your code does not
follow EVERY rule hereby stipulated, it will not be accepted
until you adapt your code so that it follows the guidelines.

## Files

### PHP Tags
PHP code MUST use the long `<?php ?>` tags.

### Encoding
PHP code MUST be encoded using UTF-8.

### Side Effects
Files SHOULD *either* declare symbols (classes, functions, constants,
etc.) ***OR*** execute logic with side effects, <ins>**but SHOULD NOT do both**</ins>.

"Side effects" include but are not limited to: generating output,
explicit use of require or include, connecting to external services,
modifying ini settings, emitting errors or exceptions, modifying global
or static variables, reading from or writing to a file, and so on.

The following is an example of a file with both declarations and side
effects; i.e, an example of what to avoid:

```php
<?php
// side effect: change ini settings
ini_set('error_reporting', E_ALL);

// side effect: loads a file
include "file.php";

// side effect: generates output
echo "<html>\n";

// declaration
function foo()
{
    // function body
}
```
The following example is of a file that contains declarations without
side effects; i.e., an example of what to emulate:
```php
<?php
// declaration
function foo()
{
    // function body
}

// conditional declaration is *not* a side effect
if (! function_exists('bar')) {
    function bar()
    {
        // function body
    }
}
```

## Namespaces and Class Names
Namespaces and class names and MUST be declared using `mixed case`, with
the first letter of each internal word capitalized.

## Class Constants, Properties, and Methods

### Constants 
Class constants MUST be declared in all upper case, with underscore
separators. For example:
```php
<?php
namespace Vendor\Model;

class Foo
{
    const VERSION = '1.0';
    const DATE_APPROVED = '2012-06-01';
}
```
### Properties and Methods
Properties and method names MUST always be declared in `camel case`.

## Routes, Controllers and Views

### Routes
Every customer route MUST be named after the model that it interacts
with (in singular). For example:
```php
Route::get('/watch/{categoryId}', '...')->name("...");
```
On the other hand, every admin route MUST specify that it is an admin
related route, and then be named according to the model it interacts
with. For example:
```php
Route::get('/admin/watch', '...')->name("...");
```

### Controllers
Every controller that is related to a customer operation MUST go inside
the `App/Http/Controllers/Customer` directory, while every controller
related to an admin operation MUST go inside the 
`App/Http/Controllers/Admin` directory.

Every method must be named after the operation it intends to
perform, without any type of redundancy. For example, avoid:
```php
class WatchController extends Controller
{
    public function listWatches($categoryId) {
        ...
    }
}
```
Instead do it like this:
```php
class WatchController extends Controller
{
    public function list($categoryId) {
        ...
    }
}
```
Also, **be specific when naming variables and parameters**. If what you
intend to declare is a variable that represents a Category Id, name
it categoryId, and not just category.

### Views
Views, just like controllers, MUST reside within their specific
directories depending on their relationship with customer or
admin operations, and ideally, they should have the same name as
the controller method that calls them.

## Specific Coding Style Rules
Every piece of PHP code MUST follow every single rule stipulated
whithin the [SonarSource PHP rules](https://rules.sonarsource.com/php),
specially the one related to **code smells**, as every pull request
will run through a static code analysis using and automated
pipeline that connects to SonarCloud.

In order to help you detect possible errors early, you can
install the SonarLint extension to your code editor or IDE, as
it will run the scan locally and tell you the results.

## Branching Methods
This project works using the trunk-based development strategy.
For every new feature you must make a new branch and then
make a pull request in order to merge it to master.
```bash
$ git checkout -b feature/my-feature
```

## Additional Notes
For easy of readability, every piece of code and documentation
MUST be written in **English**.
