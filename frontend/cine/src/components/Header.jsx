import React, { useState } from 'react';
import logo from '../assets/LogoProvisional.png';

const Header = () => {
    const [menuOpen, setMenuOpen] = useState(false);

    const toggleMenu = () => {
        setMenuOpen(!menuOpen);
    };

    return (
        <header className="bg-gradient-to-b from-black to-transparent text-white py-4 dark:bg-gradient-to-b dark:from-black-800 dark:to-transparent dark:text-gray-100 px-4 fixed top-0 left-0 right-0 z-50"> {/* Fixed y z-index para que flote */}
            <div className="container mx-auto flex items-center justify-between px-4">

                <div className="flex items-center space-x-2 justify-start">
                    <img src={logo} alt="CineLuxe Logo" className="h-10 w-auto" />
                    {/* Logo de texto en desktop */}
                    <div className="hidden lg:block text-3xl font-bold">CineLuxe</div>
                </div>

                {/* Barra de búsqueda en pantallas grandes */}
                <div className="hidden lg:flex flex-grow justify-center items-center">
                    <input
                        type="text"
                        placeholder="Buscar..."
                        className="px-4 py-2 rounded-full w-1/2 focus:outline-none dark:bg-gray-700 dark:text-white"
                        style={{
                            backgroundColor: "var(--lavender-mist)", // Usando la variable
                            color: "var(--light-slate-gray)", // Usando la variable
                        }}
                    />
                </div>

                {/* Menú de opciones (Cines, Cartelera, Tickets) a la derecha de la barra de búsqueda */}
                <div className="hidden lg:flex space-x-8 ml-auto"> {/* ml-auto para alinear a la derecha */}
                    <a href="/cines" className="text-white hover:text-[var(--indigo)] px-3 py-2 transition-colors">Cines</a>
                    <a href="/cartelera" className="text-white hover:text-[var(--indigo)] px-3 py-2 transition-colors">Cartelera</a>
                    <a href="/tickets" className="text-white hover:text-[var(--indigo)] px-3 py-2 transition-colors">Tickets</a>
                </div>

                {/* Menú de usuario en pantallas grandes */}
                <div className="hidden lg:flex space-x-6 ml-auto"> {/* ml-auto para alinear a la derecha */}
                    <button
                        onClick={() => alert("Iniciar sesión")}
                        className="px-4 py-2 rounded-full bg-[var(--indigo)] text-white hover:bg-white hover:text-[var(--indigo)] transition-colors dark:bg-[var(--indigo)] dark:text-white dark:hover:bg-white dark:hover:text-[var(--indigo)]"
                    >
                        Iniciar sesión
                    </button>
                    <button
                        onClick={() => alert("Registrarse")}
                        className="px-4 py-2 rounded-full bg-[var(--indigo)] text-white hover:bg-white hover:text-[var(--indigo)] transition-colors dark:bg-[var(--indigo)] dark:text-white dark:hover:bg-white dark:hover:text-[var(--indigo)]"
                    >
                        Registrarse
                    </button>
                </div>

                {/* Botón de hamburguesa en pantallas pequeñas */}
                <div className="lg:hidden">
                    <button onClick={toggleMenu} className="focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            {/* Menú desplegable en pantallas pequeñas */}
            {menuOpen && (
                <div className="lg:hidden bg-[var(--indigo)] text-white py-4 dark:bg-[var(--indigo)] dark:text-gray-100">
                    <ul className="space-y-4 px-4">
                        <li><a href="/" className="block text-white hover:text-[var(--ghost-white)] px-3 py-2 transition-colors">Inicio</a></li>
                        <li><a href="/about" className="block text-white hover:text-[var(--ghost-white)] px-3 py-2 transition-colors">Acerca de</a></li>
                        <li><a href="/contact" className="block text-white hover:text-[var(--ghost-white)] px-3 py-2 transition-colors">Contacto</a></li>
                        <li><a href="/cines" className="block text-white hover:text-[var(--ghost-white)] px-3 py-2 transition-colors">Cines</a></li>
                        <li><a href="/cartelera" className="block text-white hover:text-[var(--ghost-white)] px-3 py-2 transition-colors">Cartelera</a></li>
                        <li><a href="/tickets" className="block text-white hover:text-[var(--ghost-white)] px-3 py-2 transition-colors">Tickets</a></li>
                        <li>
                            <button
                                onClick={() => alert("Iniciar sesión")}
                                className="block w-full py-2 text-center bg-[var(--ghost-white)] text-[var(--indigo)] hover:bg-[var(--indigo)] hover:text-white dark:bg-[var(--ghost-white)] dark:text-[var(--indigo)] dark:hover:bg-[var(--indigo)] dark:hover:text-white transition-colors"
                            >
                                Iniciar sesión
                            </button>
                        </li>
                        <li>
                            <button
                                onClick={() => alert("Registrarse")}
                                className="block w-full py-2 text-center bg-[var(--ghost-white)] text-[var(--indigo)] hover:bg-[var(--indigo)] hover:text-white dark:bg-[var(--ghost-white)] dark:text-[var(--indigo)] dark:hover:bg-[var(--indigo)] dark:hover:text-white transition-colors"
                            >
                                Registrarse
                            </button>
                        </li>
                    </ul>
                </div>
            )}
        </header>
    );
};

export default Header;
