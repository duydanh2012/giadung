(()=>{"use strict";$(document).ready((function(){window.platformCookieConsent=function(){var e,i=$("div[data-site-cookie-name]").data("site-cookie-name"),o=$("div[data-site-cookie-domain]").data("site-cookie-domain"),t=$("div[data-site-cookie-lifetime]").data("site-cookie-lifetime"),n=$("div[data-site-session-secure]").data("site-session-secure");function a(){var e,a,c,d;e=i,a=1,c=t,(d=new Date).setTime(d.getTime()+24*c*60*60*1e3),document.cookie=e+"="+a+";expires="+d.toUTCString()+";domain="+o+";path=/"+n,s()}function s(){$(".js-cookie-consent").hide()}return e=i,-1!==document.cookie.split("; ").indexOf(e+"=1")&&s(),$(document).on("click",".js-cookie-consent-agree",(function(){a()})),{consentWithCookies:a,hideCookieDialog:s}}()}))})();