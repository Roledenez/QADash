
installation instructions
	-> clone the project
	-> copy to C:\xampp\htdocs\ folder
	-> go to QADash\public_html
	-> open index.php
	-> go to the line number 62 or search for switch (dirname(__FILE__))
	-> replace the first case: with your DADash\public_html path
	-> import the database/testorsdb.sql if git checkout detected it has edited

folder structure
	-> application
			|
			---->controllers
			|
			---->core
			|
			---->libraries
			|
			---->views
	-> database
	-> diagrams
	-> documentation
	-> public_html
	-> system
	.gitignore
	readme.txt