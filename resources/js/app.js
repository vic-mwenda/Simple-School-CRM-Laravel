import './bootstrap';
import 'flowbite';
import { Modal } from 'flowbite';

import.meta.glob([
    '../images/**',
  ]);
import DataTable from 'datatables.net-dt';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

(function() {
  "use strict";
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach(e => e.addEventListener(type, listener))
    } else {
      select(el, all).addEventListener(type, listener)
    }
  }
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  if (select('.toggle-sidebar-btn')) {
    on('click', '.toggle-sidebar-btn', function(e) {
      select('body').classList.toggle('toggle-sidebar')
    })
  }


  if (select('.search-bar-toggle')) {
    on('click', '.search-bar-toggle', function(e) {
      select('.search-bar').classList.toggle('search-bar-show')
    })
  }

    document.addEventListener('DOMContentLoaded', function () {
        let navbar = document.getElementById('sidebar-nav');
        let navbarlinks = navbar.querySelectorAll('.nav-link');

        const navbarlinksActive = () => {
            let currentURL = window.location.href;

            navbarlinks.forEach(navbarlink => {
                if (!navbarlink.href) return;

                if (navbarlink.href === currentURL) {
                    navbarlink.classList.remove('collapsed');
                } else {
                    navbarlink.classList.add('collapsed');
                }
            });
        };

        window.addEventListener('load', navbarlinksActive);
        window.addEventListener('popstate', navbarlinksActive);
    });


  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }


  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }

    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }


  var needsValidation = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(needsValidation)
    .forEach(function(form) {
      form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })

    const datatable = new DataTable('.datatable',{

    })

    const mainContainer = select('#main');
  if (mainContainer) {
    setTimeout(() => {
      new ResizeObserver(function() {
        select('.echart', true).forEach(getEchart => {
          echarts.getInstanceByDom(getEchart).resize();
        })
      }).observe(mainContainer);
    }, 200);
  }

    const passwordInput = document.getElementById('password');
    const lengthFeedback = document.getElementById('password-length');
    const upperLowerFeedback = document.getElementById('password-upper-lower');
    const numberFeedback = document.getElementById('password-number');
    const passwordFeedback = document.getElementById('password-feedback');

    passwordInput.addEventListener('keyup', () => {
        const password = passwordInput.value;
        let validLength = false;
        let validUpperLower = false;
        let validNumber = false;

        // Check length
        if (password.length >= 8) {
            lengthFeedback.classList.remove('invalid');
            lengthFeedback.classList.add('valid');
            validLength = true;
        } else {
            lengthFeedback.classList.remove('valid');
            lengthFeedback.classList.add('invalid');
            validLength = false;
        }

        // Check upper and lowercase
        if (/[a-z]/.test(password) && /[A-Z]/.test(password)) {
            upperLowerFeedback.classList.remove('invalid');
            upperLowerFeedback.classList.add('valid');
            validUpperLower = true;
        } else {
            upperLowerFeedback.classList.remove('valid');
            upperLowerFeedback.classList.add('invalid');
            validUpperLower = false;
        }

        // Check at least one number
        if (/\d/.test(password)) {
            numberFeedback.classList.remove('invalid');
            numberFeedback.classList.add('valid');
            validNumber = true;
        } else {
            numberFeedback.classList.remove('valid');
            numberFeedback.classList.add('invalid');
            validNumber = false;
        }

        // Check if all conditions are met
        if (validLength && validUpperLower && validNumber) {
            passwordFeedback.style.display = 'none';
        } else {
            passwordFeedback.style.display = 'block';
        }
    });





})();
