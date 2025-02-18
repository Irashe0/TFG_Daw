import { useEffect, useState } from "react";
import MovieCard from "./MovieCard";
import imagen from "../assets/PlaceHolder.jpg"

const MovieList = () => {
  const [movies, setMovies] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetch("http://127.0.0.1:8000/api/peliculas")
      .then((response) => response.json())
      .then((data) => {
        setMovies(data);
        setLoading(false);
      })
      .catch((error) => {
        console.error("Error al obtener las películas:", error);
        setLoading(false);
      });
  }, []);

  if (loading) {
    return <div className="text-center">Cargando películas...</div>;
  }

  return (
    <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
      {movies.map((movie) => (
        <MovieCard
          key={movie.id_pelicula}
          id={movie.id_pelicula}
          title={movie.titulo}
          posterUrl={imagen}
          rating={movie.clasificacion}
          trailerUrl={movie.trailer || null}
        />
      ))}
    </div>
  );
};

export default MovieList;
