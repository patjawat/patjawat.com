=== Custom API For WP ===
Contributors: cyberlord92
Tags: custom endpoints, crud, CUSTOM, ROUTES, REST API
Requires at least: 3.0.1
Requires PHP: 5.4
Tested up to: 5.5
Stable tag: 1.1.6
License: MIT/Expat
License URI: https://docs.miniorange.com/mit-license

This plugin allows you to create custom endpoints/REST routes to fetch/modify/create/delete data with an easy-to-use graphical interface. 
== Description ==

This plugin helps you create Custom endpoints /Custom REST APIs to fetch any type of data from user roles, groups to featured images, and any custom data as well that you want. Apart from just fetching data you can POST, PUT, DELETE (Insert, Update, Delete) data  with these created Custom endpoint / Custom REST routes . Any type of interaction with data is possible by creating Custom endpoints with a very simple GUI. Additionally, you can control the visibility and customize the metadata attached to the Custom endpoint response . Also, it provides an option to protect your Custom API from unauthorized access.

= Use Case =
•	Accessing some custom data into your mobile application or web clients via custom Endpoints.
•	Create, Read, Update and Delete WordPress content from client-side JavaScript or from external applications, even those written in languages beyond PHP by creating easy to use Custom REST Routes


= Free Version Features =
•	Unlimited Custom APIs(endpoints) can be created
•	Give names to Custom Endpoints/Custom REST routes
•	Build custom routes for all tables within WordPress
•	Build custom routes for fetching posts and taxonomies
•	Fetch any type of data available in WordPress via custom endpoints
•	Full control of Custom API responses without writing a single line of PHP code.
•	Fetch operation available with single WHERE condition
•	Can be integrated with all types of applications 
•	Can perform simple and advanced SQL queries on the WordPress database by creating custom rest routes

= Premium Version Features =
•	Create custom namespaces and routes
•	Multiple endpoints allowed per REST route
•	Create Custom route for posts and taxonomies creation, modification, deletion.
•	Supports all kinds of HTTP Methods.
•	Single Custom Endpoint (API) can be used for multiple HTTP methods
•	Filters included to alter and extend default functionality 
•	Fetch operation available with multiple custom conditions
•	Limit the no of responses you get as result of Custom Endpoints (API). 
•	Option to enable or disable the Custom endpoints according to your requirements.
•	Complex queries formation with Advance mechanism.
•	Restrict public access to all Custom REST Routes with API KEY Authentication method and some other Authentication methods are also provided as ADD-ON like
	1. Client credentials
	2. JWT Tokens
	3. Basic Authorization
	4. OAuth


Authentication related information can be sent by any suitable REST client for eg-  You can use CURL calls to send HTTP Requests or even any IDE like PHPSTORM or you can go with POSTMAN to send an authentication key.


= Type of APIs supported : =
•	‘HTTP GET` (This can be used to retrieve data from your WordPress)
•	‘HTTP POST’ (This can be used to insert data in your WordPress)
•	‘HTTP PUT’ (This can be used to update data in your WordPress)
•	‘HTTP DELETE’ (This can be used to delete data in your WordPress)

= Type of Data which you can retrieve with Custom Endpoints : =
•	WP Users and User Meta
•	WP Roles and Capabilities
•	WP Posts, Pages and custom post types
•	WP Options
•	WP Taxonomy
•	Woocommerce products
•	Custom data , Custom posts, Custom parameters , Custom fields and many more




== Installation ==

= From your WordPress dashboard =
1. Visit `Plugins > Add New`
2. Search for `Custom API for WP`. Find and Install `Custom API for WP` plugin by miniOrange
3. Activate the plugin

= From WordPress.org =
1. Download `Custom API for WP` plugin
2. Unzip and upload the `custom-api-for-wp` directory to your `/wp-content/plugins/` directory.
3. Activate miniOrange API plugin from your Plugins page.

= Once Activated =
1. Go to `Settings-> Custom API` menu
2. Click on `Create API` button
3. Choose data which you want to retrieve with API and conditions to retrieve data
4. Save the configuration and your API will be ready to use.

== Frequently Asked Questions ==

= I do not see the data which I want to send with API? =
Please email us at info@xecurify.com or submit your query from plugin support form so that we can add support for your case.


== Screenshots ==
1. List all created API's
2. Create API UI
3. Response of API call


== Changelog ==

= 1.1.1 =
* Initial version

= 1.1.2 =
* Added UI changes and contact form bug fix

= 1.1.3 =
* Added feedback form at deactivation

= 1.1.4 =
* Improved SEO and added compatibility with WP 5.5

= 1.1.5 =
* Showing all premium features and Added customer registration tab

= 1.1.6 =
* Bugs and UI fixes 