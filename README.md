
# Quality Fetch from 2Embed

This script allows you to fetch the quality of the movie from the 
2embed.to website. And it have extra 2 features as well. Where you 
can lookup for the movie/series are available in the 2embed or not.





## API Reference

#### Check the quality of movie

```http
  GET /qualitycheck?name={movie_name} //Movie Name
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `movie` | `string` | **Required** |


    Returns the quality in the string like 'HD, 'CAM', 'SD'.

    
#### Check the Availability of the movie

```http
  GET /availablemoviecheck?id={tmdb_id} //TMDB ID of movie
  GET /availableseriecheck?id={tmdb_id} //TMDB ID of series
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `integer` | **Required**. TMDB ID of movie/serie to check |


Takes the tmdb_id in the url parameter and returns the 1 if movie is
available and returns 0 if the movie is not available. 

