import React from 'react';

const Footer = () => {
  return (
    <footer className="bg-gray-800 text-white py-6 mt-8">
      <div className="container mx-auto text-center">
        <p>&copy; 2025 Mi Aplicación. Todos los derechos reservados.</p>
        <div className="mt-4">
          <a href="https://facebook.com" className="mx-2 hover:text-blue-500">Facebook</a>
          <a href="https://twitter.com" className="mx-2 hover:text-blue-400">Twitter</a>
          <a href="https://instagram.com" className="mx-2 hover:text-pink-500">Instagram</a>
        </div>
      </div>
    </footer>
  );
}

export default Footer;
