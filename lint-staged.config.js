module.exports = {
  "./src/**/*.{css,js}": ["prettier --write"],
  "./src/resources/js/**.{js,jsx,vue}": ["eslint --fix"],
  "**/*.php": [
    "php ./vendor/bin/php-cs-fixer fix --config .php-cs-fixer.php --allow-risky=yes",
  ],
};
