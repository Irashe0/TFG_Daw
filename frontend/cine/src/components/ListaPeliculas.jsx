import { useEffect, useState } from "react";
import MovieCard from "./MovieCard";

const ListaPeliculas = () => {
  const [movies, setMovies] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchMovies = async () => {
      try {
        const response = await fetch("http://127.0.0.1:8000/api/peliculas", {
          headers: {
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
        });
        if (!response.ok) throw new Error("Error al obtener las películas");
        const data = await response.json();
        setMovies(data);
      } catch (error) {
        console.error(error);
      } finally {
        setLoading(false);
      }
    };
    fetchMovies();
  }, []);

  if (loading) return <p>Cargando películas...</p>;

  return (
    <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">
      {movies.map((movie) => (
        <MovieCard 
          key={movie.id_pelicula} 
          id={movie.id_pelicula} 
          title={movie.titulo} 
          posterUrl={movie.imagen || "https://www.google.com/url?sa=i&url=https%3A%2F%2Fgeeksui.codescandy.com%2Fgeeks%2Fdocs%2Fcard.html&psig=AOvVaw1AxP_xr-jSkNLW6OX9pSIr&ust=1739892270070000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCIjtq_mBy4sDFQAAAAAdAAAAABAE"} 
          rating={movie.rating || "N/A"} 
        />
      ))}
    </div>
  );
};

export default ListaPeliculas;
