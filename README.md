# Recon – Import from Excel to YNAB

Recon is a tool for importing bank account statements from Excel files to YNAB.

I'm making it specifically for me and the statements I get from my bank, to help reconciling the YNAB budget accounts.

## How to install

```
git clone https://github.com/prikkprikkprikk/recon.git
cd recon
composer install
npm install
npm run build
php artisan key:generate
cp .env.example .env
```

In the .env file:
* enter your database credentials
* edit the `ADMIN_USER_*` variables to your name, email and bcrypted password
* [Get a YNAB personal access token](https://api.youneedabudget.com/#quick-start) and enter it in the .env file in the variable `YNAB_ACCESS_TOKEN`.

Then, run migrations:

```
php artisan migrate:fresh --seed
```

## Testing

```
./vendor/bin/pest
```

## Contributing

At the moment I'm not really considering accepting PRs, but I might be in the future. Do not hesitate to get in touch, though.

## License

This application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
