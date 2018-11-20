Contributing
============

If you've written a new devloppment, adapted AutoMenu to a new service, or fixed a bug, your contribution is welcome!

Before proposing a pull request, check the following:

* Your code should follow the [PSR-4 coding standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md). Run `make sniff` to check that the coding standards are followed, and use [php-cs-fixer](https://github.com/fabpot/PHP-CS-Fixer) to fix inconsistencies.
* Unit tests should still pass after your patch. Run the tests on your dev server (with `make test`) or check the continuous integration status for your pull request.
* As much as possible, add unit tests for your code
* If you add new add-ins, please include documentation for it in the README. Don't forget to add a line about new add-ins in the `@property` or `@method` phpDoc entries to help IDEs auto-complete your formatters.
* Avoid changing existing sets of data. Changing the data can make actual tests fail.
* Speed is important in all AutoMenu usages. Make sure your code is optimized to generate menus in no time, without consuming too much memory or CPU.
* If you commit a new feature, be prepared to help maintaining it. Watch the project on GitHub, and please comment on issues or PRs regarding the feature you contributed.

Once your code is merged, it is available for free to everybody under the New BSD License. Publishing your Pull Request on the AutoMenu GitHub repository means that you agree with this license for your contribution.

Thank you for your contribution! AutoMenu wouldn't be so great without you.
