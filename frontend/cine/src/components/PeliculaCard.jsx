import PropTypes from "prop-types";
import { useNavigate } from "react-router-dom";

const MovieCard = ({ id, title, posterUrl, rating, trailerUrl }) => {
  const navigate = useNavigate();

  return (
    <div className="relative group overflow-hidden rounded-md shadow-md transition-all duration-300 ease-in-out transform hover:scale-105 w-48">
      <img 
        className="w-full h-60 object-cover"
        src={posterUrl || "/placeholder.svg"} 
        alt={`${title} poster`} 
      />
      <div className="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        <div className="absolute bottom-0 left-0 right-0 p-4 text-white text-sm">
          <h3 className="text-lg font-bold mb-1">{title}</h3>
          <div className="flex items-center mb-2">
            <svg className="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            <span className="font-bold text-yellow-400 text-sm">{rating}</span>
          </div>
          <div className="flex flex-col space-y-1">
            <button 
              className="bg-blue-500 text-white text-xs px-3 py-1 rounded-full font-semibold hover:bg-blue-600 transition"
              onClick={() => navigate(`/horarios/${id}`)}
            >
              Horarios
            </button>
            <button 
              className="bg-red-500 text-white text-xs px-3 py-1 rounded-full font-semibold hover:bg-red-600 transition"
              onClick={() => window.open(trailerUrl, "_blank")}
              disabled={!trailerUrl}
            >
              {trailerUrl ? "Tráiler" : "No Tráiler"}
            </button>
            <button 
              className="bg-gray-700 text-white text-xs px-3 py-1 rounded-full font-semibold hover:bg-gray-800 transition"
              onClick={() => navigate(`/peliculas/${id}`)}
            >
              Detalles
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

MovieCard.propTypes = {
  id: PropTypes.number.isRequired,
  title: PropTypes.string.isRequired,
  posterUrl: PropTypes.string,
  rating: PropTypes.number.isRequired,
  trailerUrl: PropTypes.string
};

export default MovieCard;
