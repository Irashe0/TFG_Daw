import React from 'react';
import Header from './components/Header';
import Footer from './components/Footer';
import ImageCarousel from './components/Carrusel';

// Importar imágenes
import PlaceHolder1 from './assets/Banner1.jpg';
import PlaceHolder2 from './assets/Banner2.jpg';
import PlaceHolder3 from './assets/Banner3.jpg';
import PlaceHolder4 from './assets/Banner4.jpg';
import MovieCard from './components/PeliculaCard';

function App() {
  const images = [PlaceHolder1, PlaceHolder2, PlaceHolder3, PlaceHolder4];

  return (
    <div className="min-h-screen flex flex-col">
      <Header />
      <div className="relative">
        <ImageCarousel images={images} interval={3000} />
      </div>
      <MovieCard/>
      <Footer />
    </div>

  );
}

export default App;
