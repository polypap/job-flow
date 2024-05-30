import './bootstrap';
import './lib/isotope/isotope.pkgd.min.js';
import './lib/owlcarousel/owl.carousel.min.js';
// Added: Popper.js dependency for popover support in Bootstrap
import '@popperjs/core';
import 'tinymce/tinymce';
import './front.js';

import 'tinymce/icons/default/icons';
import 'tinymce/models/dom/model';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/skins/content/default/content.min.css';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/themes/silver/theme';
window.addEventListener('DOMContentLoaded', () => {
  tinymce.init({
      selector: 'textarea',

      /* TinyMCE configuration options */
      skin: false,
      content_css: false,
      promotion: false
  });
});
// jQuery(document).ready(function() {
//   jQuery('.home-avatar').hover(function() {
//     jQuery(this).addClass('show');
//     jQuery(this).find('.dropdown-menu').addClass('show');
//   }, function() {
//     jQuery(this).removeClass('show');
//     jQuery(this).find('.dropdown-menu').removeClass('show');
//   });
// });