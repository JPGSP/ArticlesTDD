# ArticlesTDD

## Exercise
The purpose of this project is to expose the data given in a JSON file (`assets/articles.json`) via an API in specific
stucture, following TDD's practise.

For the content field, the raw text or HTML should be parsed and transformed into blocks, for example a paragraph might turn into the following object:
```
{
    type: 'paragraph',
    content: 'Lorem ipsum dolor sit amet',
}
```
The inner paragraph formatting and tags should be preserved.

## System requirements

 - PHP 7.0.0 or above.
 - Git.
 - Composer.

## Download the source code:

Go to the folder where you have all your projects:

```bash
cd /path/to/projects/folder/
```

Then clone the Git Repository:

```bash
git clone https://github.com/JPGSP/ArticlesTDD.git
```

Once the previous process has finished a new folder ```articlesTDD``` will be created.

## Usage

- Install dependecies

Go inside the folder just created:

```bash
cd /path/to/projects/folder/articlesTDD
```

Install project dependencies

```bash
composer install
```

- Run the test.

Two options are available

```bash
vendor/bin/phpunit tests/
```

```bash
composer test
```
