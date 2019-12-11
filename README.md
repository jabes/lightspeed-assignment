# Lightspeed Assignment

Using either PHP or GO compute the number of gifts, on any given day, received in the song “The Twelve days of Christmas”.

### Installation & Use

```bash
git clone https://github.com/jabes/lightspeed-assignment.git
cd lightspeed-assignment
composer install --no-dev
php index.php --day 12
```

Expected output:
> You have received 12 gifts on day 12 for a total of 78 gifts since day 1.

### Testing

```bash
composer install --dev
vendor/bin/phpunit tests/ --colors --verbose --debug
```

❤️