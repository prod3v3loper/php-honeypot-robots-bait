# PHP HoneyPot Robots Bait

The goal is to confuse or distract the hacker. However, there are differences, automated or manual.

## Manual

In order to code an attack manually, one would also have to debug, which means that it will not be enough on your test system.

## Automatic

A finished tool, however, which is already more advanced, will not need this. Because these are programmed specifically for systems and run automatically. But both can be misled.

# Bait

We issue a `robots.txt` if it doesn't exist. If there is one, we write the following in it.

```
User-agent: *
Disallow: /backdoor.php
```

> **Malicious**
>
> If the bot or a hacker looks up the robots.txt and calls up the unauthorized pages, it is a sign of malicious intent.

In this case the `robots.txt` serves as a bait in which we display a file with the important name` backdoor.php`, which is our honeypot.

# Confuse

In our honepot file, so in this example the `backdoor.php` contains the following information:

> **Choose**
>
> The name for the file backdoor is freely chosen here and can be named as desired.

Our `logger.php` is located above the HTML, which writes the data to our `honeypot.log` file.

```php
<?php require_once 'logger.php'; ?>
```

We show the bot or hacker that it landed on a non-existent page, so we're just faking it and log him in our honeypot.

```html
<html>
  <script type="text/javascript">
    window["_gaUserPrefs"] = {
      ioo: function () {
        return true;
      },
    };
  </script>
  <head>
    <title>404 Not Found</title>
  </head>
  <body>
    <h1>Not Found</h1>
    <p>The requested URL was not found on this server.</p>
  </body>
</html>
```

# Refuse

Once everything has been implemented, the attacker's data is written to a file with the help of the `logger.php`

## Log file permissions

The rights for the file are therefore set in `logger.php`.

> **Important**
>
> The `honeypot.log` must not be read from the browser.

Read and write permissions for the owner, none for everyone else.

```php
chmod("/somedir/somefile", 0600)
```

## Example log

The file called `honeypot.log` contains all the attackers

```log
[15.10.2021 - 18:14:41]
IP: 127.0.0.1
AGENT: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36
HOST: 127.0.0.1
```

# Checking

- [x] Created or edited `robots.txt`
- [x] Add `backdoor.php` and `logger.php`

# Conclusion

This is a method to possibly receive information about an attack.
There are of course many other options that I will present here.

# Contribute

Please an [issue](https://github.com/prod3v3loper/honeypot-simple-php/issues) if you
think something could be improved. Please submit Pull Requests when ever
possible.

# Authors

**[Samet Tarim](https://www.prod3v3loper.com)** - _All works_

# Supporter

[Tnado](https://www.tnado.com/blog/)
[Hyperly](https://www.hyperly.de)

# License

[GNU](https://github.com/prod3v3loper/php-mvc-professional/blob/master/LICENSE) - [prod3v3loper](https://www.tnado.com/author/prod3v3loper/)