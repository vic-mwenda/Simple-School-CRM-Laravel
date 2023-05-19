import './bootstrap';
import 'flowbite';

import.meta.glob([
    '../images/**',
  ]);

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
