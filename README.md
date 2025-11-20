# CloudFlare Universal SSL for Joomla! 4+
![Static Badge](https://img.shields.io/badge/Joomla-4.x,_5.x,_6.x_compatible-blue?logo=joomla)

**CloudFlare Universal SSL for Joomla!** is a simple Joomla system plugin that helps
your site fully leverage Cloudflare's free SSL (Universal SSL) under the
modern Cloudflare interface.

The plugin:

1.  Resolves infinite redirect loops
2.  Ensures all content (images, CSS, JS) loads via **HTTPS**, even if
    URLs are absolute or relative

------------------------------------------------------------------------

## Documentation

### 1. Prepare your Joomla! Site

1.  Install the "CloudFlare for Joomla!" system plugin.
2.  Enable the plugin
3.  If you don't have a Cloudflare account yet, sign up and add your
    site. Make sure to change your nameservers to Cloudflare's, per your
    host's instructions.

------------------------------------------------------------------------

### 2. Configure SSL / HTTPS in Cloudflare

1.  Log in to the Cloudflare Dashboard and select your domain.
2.  Go to **SSL/TLS** from the left sidebar.
    -   In the **Overview** tab, check the **SSL/TLS encryption mode**.
    -   If the current status is **Disabled**, then change the mode to **Flexible**
3.  Open the **Edge Certificates** tab.
    -   Ensure **Universal SSL** is **Enabled**.
    -   Turn **Always Use HTTPS** to **ON**.
    -   Turn **Automatic HTTPS Rewrites** to **ON**
4.  Wait for the certificate to activate. Provisioning is very fast but it may take from **15
    minutes to 24 hours**.
5.  Confirm activation: The certificate status should show **"Active"**
    in **Edge Certificates**.

------------------------------------------------------------------------

### 3. Optional: Page Rule for HTTPS

If you need additional redirect control:
  
1. Go to **Rules → Page Rules**.
2.  Create a new rule:

        http://www.example.com/*

3.  Add a setting: **Always Use HTTPS → ON**
4.  Save and ensure the rule is placed early in the list.

------------------------------------------------------------------------

### 4. Final Steps

-   Wait 10 to 30 minutes after making changes.
-   Visit your site via `http://` to confirm it redirects to
    `https://`.\
-   Inspect network resources to confirm images, CSS, and JS load via
    HTTPS.

------------------------------------------------------------------------

## Done!

Your Joomla site now uses secure HTTPS with Cloudflare's modern
Universal SSL setup while avoiding redirect loops.

## Credits

This project is based on the original work by **[Mike Feng Jinglong at SIMBunch](https://www.simbunch.com/products/free-extensions/cloudflare-for-joomla)**, published several years ago and no longer maintained. The current repository continues that work with updates, fixes, and ongoing improvements.
