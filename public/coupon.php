function getQueryVariable(variable) { var query = window.location.search.substring(1); var vars = query.split("&"); for (var i = 0; i < vars.length; i++) { var pair = vars[i].split("="); if (pair[0] == variable) { return pair[1]; } } return false; } function TFTBpromo(obj) { if (!(this instanceof TFTBpromo)) { return new TFTBpromo(obj); } /* --- Options List --- */ /* Name: Default Value */ /* */ /* promos: null */ /* */ /* -------------------- */ var tftbThis = this; if (!obj) { var obj = {}; } if (obj.promos) { this.promos = obj.promos; } else { this.promos = null; } /* TFTBpromo({promos: [ { code: '50off', prodShow: ['12345678'], prodHide: ['12345677'] }, { code: '50off', prodShow: ['12345678'] } ]}); */ var $productWrapper = ($('.elOrderProductOptionsWrapper[data-de-type="orpo"]').length > 0) ? $('.elOrderProductOptionsWrapper[data-de-type="orpo"]') : $('.elOrderProductOptions').first(); var promoProducts = new Array(); this.init = function() { for (var b = 0; b < tftbThis.promos.length; b++) { for (var c = 0; c < tftbThis.promos[b].prodShow.length; c++) { promoProducts.push({prodID: tftbThis.promos[b].prodShow[c], prodHTML: $('[id^=pid-' + tftbThis.promos[b].prodShow[c] + ']').parent().parent()}); $('[id^=pid-' + tftbThis.promos[b].prodShow[c] + ']').parent().parent().hide(); } if (tftbThis.promos[b].prodHide) { for (var d = 0; d < tftbThis.promos[b].prodHide.length; d++) { promoProducts.push({prodID: tftbThis.promos[b].prodHide[d], prodHTML: $('[id^=pid-' + tftbThis.promos[b].prodHide[d] + ']').parent().parent()}); } } } $productWrapper.show(); if (getQueryVariable('promo')) { var urlPromo = getQueryVariable('promo'); for (var e = 0; e < tftbThis.promos.length; e++) { if (urlPromo.toLowerCase().replace(/ /g, '') == tftbThis.promos[e].code.toLowerCase().replace(/ /g, '')) { console.log('URL Promo Match'); for (var f = 0; f < tftbThis.promos[e].prodShow.length; f++) { $('[id^=pid-' + tftbThis.promos[e].prodShow[f] + ']').parent().parent().show(); } if (tftbThis.promos[e].prodHide) { for (var g = 0; g < tftbThis.promos[e].prodHide.length; g++) { $('[id^=pid-' + tftbThis.promos[e].prodHide[g] + ']').parent().parent().hide(); } } } } } if ($('[data-title=promo-text]').length > 0 && $('[data-title=promo-button]').length > 0) { $('[data-title=promo-button] a').attr('href', '#'); $('[data-title=promo-button] a').off(); $(document).on('click', '[data-title=promo-button]', function() { for (var h = 0; h < tftbThis.promos.length; h++) { if ($('[data-title=promo-text] input').val().toLowerCase().replace(/ /g, '') == tftbThis.promos[h].code.toLowerCase().replace(/ /g, '')) { for (var i = 0; i < tftbThis.promos[h].prodShow.length; i++) { $('[id^=pid-' + tftbThis.promos[h].prodShow[i] + ']').parent().parent().show(); } if (tftbThis.promos[h].prodHide) { for (var k = 0; k < tftbThis.promos[h].prodHide.length; k++) { $('[id^=pid-' + tftbThis.promos[h].prodHide[k] + ']').parent().parent().hide(); } } } } }); } console.log("****************************\n" + "* *\n" + "* Promo Code Functionality *\n" + "* provided by: *\n" + "* *\n" + "* The Funnel Toolbox *\n" + "* TheFunnelToolbox.com *\n" + "* *\n" + "****************************"); } $(function() { tftbThis.init(); }); }