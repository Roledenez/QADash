
Installation instructions
	-> clone the project
	-> copy to C:\xampp\htdocs\ folder
	-> go to QADash\public_html
	-> open index.php
	-> go to the line number 62 or search for switch (dirname(__FILE__))
	-> replace the first case: with your DADash\public_html path
	-> import the database/testorsdb.sql if git checkout detected it has edited

after correctly configure the project you can visite http://localhost:8090/QADash/public_html/admin/user/login to go to the dashboard interface. note that your port and the path may be change

username : admin@admin.com
pwd		 : admin

please read the documentation and study the diagrams as well, I have provided a diagram guide to easily understand the diagram
--------------------------------------------------------------
Folder structure
	-> application
			|
			---->controllers
			|
			---->core
			|
			---->libraries
			|
			---->views
	-> assert/database
	-> assert/diagrams
	-> documentation
	-> public_html
	-> system
	.gitignore
	readme.txt