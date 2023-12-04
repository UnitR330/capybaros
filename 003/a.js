console.log('Welcome to castle')


movies = [

    {'title': 'Terminator', 'year': 1984, 'rating': 8.0},
    {'title': 'Comando', 'year': 1984, 'rating': 6.7},
    {'title': 'Predator', 'year': 1987, 'rating': 7.9},
    {'title': 'Total Recal', 'year': 1991, 'rating': 7.5},
    {'title': 'Terminator 2 Judgement Day', 'year': 1991, 'rating': 8.5},
    {'title': 'True Lies', 'year': 1991, 'rating': 7.2},
    {'title': 'Terminator', 'year': 1984, 'rating': 8.0},
]
const allRatingSum = movies.reduce((sum, movie) => sum + movie.rating, 0);
const maxRating = movies.reduce((max, movie) => movie.rating > max ? movie.rating : max, 0);
const averageRating = movies.reduce ((sum, movie, index, array) =>  {
    sum += movie.rating;
    if (index === array.length -1) {
        return sum / array.length;
    } else {
        return sum;
    }
} , 0);
console.log('All ratings sum: ', allRatingSum.toFixed(2), 'Max rating:', maxRating, averageRating.toFixed(2));

// movies.sort((a, b) => b.rating - a.rating);
// movies.sort((a, b) => {
//   if (a.name < b.name) {
//   return 1;
//       }
//     if (b.name < a.name) {
//       return -1;
//       }
//   })

movies.sort((a, b) => b.title.localeCompare(a.title));

console.log(movies);


const sortedMovies = movies.sort((a, b) => {
    if (a.year !== b.year) {
        return a.year - b.year;
    }
    
    return b.rating - a.rating;
});

console.log("Sorted Movies:", sortedMovies);


const byYearAndRatig = movies.sort((a, b) => {
    if (a.year < b.year) {
        return -1;
    }
    if (b.year < a.year) {
        return 1;
    }
    if (a.rating < b.rating) {
        return 1;
    }
    if (b.rating < a.rating) {
        return -1;
    }
    return 0;

});
console.log(movies);