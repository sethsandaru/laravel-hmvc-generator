# Laravel Search 3 - Seth Sandaru
Tired to build a Search Page for Management or for User using everytime? And in the future, when you want to upgrade/update it, you have to look back the code, read the code, code, blah blah,... It's too much to handle and cost you very much for both of time & money.

Because of that problem, just like the Vue Form Builder. Laravel Search 3 is built to help you to archive that. 

Laravel Search 3 will help you to:
- Build & Config your own Search Page
	- Drag 'n Drop to build the Search Form (Fields to search, lookup,... Conditional Field)
	- Drag 'n Drop to build the Table Result 
- Render the page with full functional by using the **DataTable**.
- Server & Client Event Hooks to help you do deal with your own data problem.
- Easy to use, easy to maintain/upgrade in the future.
- Supported Bootstrap 3 & 4.

Status: **In Development**
	
## Dependencies
- PHP 7.1+ & Laravel 5
- JQuery
- JQuery UI
- DataTable
- Select2
- Bootstrap Tag Input
- FontAwesome 4.4.0

## Development Stages
1. Prototype
	- Template & Rendering (Table & Form)
	- Library init
	- Structure project
2. Configuration
	- SearchGroup & SearchRelation
	- Search3 default config
3. Search 3 Library
	- SearchBuilder
		- SearchJoin
		- SearchSelect
		- SearchCondition
	- Event Hooks
	- APIs???
	- Helpers???
4. Search 3 Configuration (Drag & Drop). Based on JQuery & JQuery UI.
	- Search Form
	- Table Result
5. Search 3 Front-end
	- Search3Builder (depend on the configuration)
		- Hooks
		- Default config
6. Test cases:
	- Simple table
	- Table & 1 join
	- Table & 2 join
	- Table & 3 join with 1 complex join
	- Complex Conditions while searching
	- Use hook to manipulate the search query builder (SERVER).
	- Use hook to manipulate the search result builder (SERVER).
	- Test hook in Front-End
	
## Supporting the project
If you really like this project & want to contribute a little for the development. You can buy me a coffee. Thank you very much for your supporting ♥.

<a href="https://www.buymeacoffee.com/xKOM9NB8p" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: auto !important;width: auto !important;" ></a>

Copyright &copy; 2018 by [Seth Phat](http://sethphat.com) aka Phat Tran Minh!
