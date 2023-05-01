tarteaucitron.init({
    privacyUrl:
        "https://www.esteveagora.com/privacidad" /* Privacy policy url */,
    bodyPosition:
        "bottom" /* or top to bring it as first element for accessibility */,

    hashtag: "#tarteaucitron" /* Open the panel with this hashtag */,
    cookieName: "esteve-consent-cookie" /* Cookie name */,

    orientation: "middle" /* Banner position (top - bottom - middle - popup) */,

    groupServices: false /* Group services by category */,

    showAlertSmall: false /* Show the small banner on bottom right */,
    cookieslist: false /* Show the cookie list */,

    showIcon: true /* Show cookie icon to manage cookies */,
    // "iconSrc": "", /* Optionnal: URL or base64 encoded image */
    iconPosition:
        "BottomRight" /* Position of the icon between BottomRight, BottomLeft, TopRight and TopLeft */,

    adblocker: false /* Show a Warning if an adblocker is detected */,

    DenyAllCta: true /* Show the deny all button */,
    AcceptAllCta: true /* Show the accept all button when highPrivacy on */,
    highPrivacy: true /* HIGHLY RECOMMANDED Disable auto consent */,

    handleBrowserDNTRequest: false /* If Do Not Track == 1, disallow all */,

    removeCredit: false /* Remove credit link */,
    moreInfoLink: false /* Show more info link */,
    useExternalCss: false /* If false, the tarteaucitron.css file will be loaded */,

    //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for subdomain website */

    readmoreLink:
        "" /* Change the default readmore link pointing to tarteaucitron.io */,

    mandatory: true /* Show a message about mandatory cookies */,
});

tarteaucitron.user.googletagmanagerId = "G-994CQ4T9BT";
(tarteaucitron.job = tarteaucitron.job || []).push(
    "googletagmanager",
    "youtube"
);
