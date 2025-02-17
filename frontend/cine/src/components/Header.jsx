"use client"

import { useState } from "react"

export default function Navbar() {
    const [isSearchOpen, setIsSearchOpen] = useState(false)

    return (
        <header className="fixed top-0 left-0 w-full z-50 bg-gradient-to-b from-black to-transparent">
            <div className="flex justify-between items-center h-16 px-6">
                {/* Logo */}
                <a href="/" className="text-2xl font-bold text-white-300 hover:text-[var(--principal)]" >
                    CineLuxe
                </a>

                {/* Navegación */}
                <nav className="flex space-x-6">
                    {["Cines", "Cartelera"].map((item) => (
                        <a
                            key={item}
                            href="#"
                            className="relative text-white hover:text-[var(--principal)] group"
                        >
                            {item}
                            <span className="absolute bottom-[-12px] left-0 block w-0 h-[2px] bg-yellow-500 transition-all duration-300 group-hover:w-full group-focus:w-full group-focus:bg-gold-500 group-focus:transition-all"></span>
                        </a>
                    ))}
                </nav>

                {/* Search + Login */}
                <div className="flex items-center space-x-4">
                    {/* Search Bar con Click */}
                    <div className="relative">
                        <button
                            onClick={() => setIsSearchOpen(!isSearchOpen)}
                            className="p-2 text-white hover:text-[var(--principal)] transition-all duration-300"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                className="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth={2}
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                />
                            </svg>
                        </button>

                        {/* Input de búsqueda que se despliega */}
                        <input
                            type="text"
                            placeholder="Buscar películas..."
                            className={`absolute top-1/2 right-10 -translate-y-1/2 px-2 py-1 text-sm border border-[var(--principal)]-300 rounded-md shadow-md focus:outline-none focus:ring focus:border-[var(--principal)] transition-all duration-500 ease-in-out 
                                ${isSearchOpen ? 'w-72 opacity-100' : 'w-0 opacity-0'}
                            `}
                            autoFocus
                            onBlur={() => setIsSearchOpen(false)}
                        />
                    </div>

                    {/* Login */}
                    <a href="/login" className="text-white hover:text-[var(--principal)]">
                        Login
                    </a>
                </div>
            </div>
        </header>
    )
}
