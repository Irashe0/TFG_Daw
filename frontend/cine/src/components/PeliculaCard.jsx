import PropTypes from "prop-types"

const MovieCard = ({ title, posterUrl, rating }) => {
  return (
    <div className="w-[250px] relative group overflow-hidden rounded-lg shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105">
      {/* Aquí usas posterUrl como fuente de la imagen */}
      <img className="w-full h-[300px] object-cover" src={posterUrl} alt={`${title} poster`} />
      <div className="absolute inset-0 bg-gradient-to-t from-dark-gray via-dark-gray/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        <div className="absolute bottom-0 left-0 right-0 p-4 text-ghost-white">
          <h3 className="text-xl font-bold mb-2">{title}</h3>
          <div className="flex items-center mb-4">
            <svg className="w-5 h-5 text-principal mr-1" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            <span className="font-bold text-principal">{rating}</span>
          </div>
          <div className="flex flex-col space-y-2">
            <button className="bg-principal text-dark-gray px-4 py-2 rounded-full font-semibold hover:bg-opacity-80 transition-colors duration-300">
              Ver Horarios
            </button>
            <button className="bg-ghost-white text-dark-gray px-4 py-2 rounded-full font-semibold hover:bg-opacity-80 transition-colors duration-300">
              Ver Trailer
            </button>
            <button className="bg-light-slate-gray text-ghost-white px-4 py-2 rounded-full font-semibold hover:bg-opacity-80 transition-colors duration-300">
              Ver Detalles
            </button>
          </div>
        </div>
      </div>
    </div>
  )
}

MovieCard.propTypes = {
  title: PropTypes.string.isRequired,
  posterUrl: PropTypes.string.isRequired, 
  rating: PropTypes.number.isRequired,
}

export default MovieCard
