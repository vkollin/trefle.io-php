# Trefle.io PHP client

This is a client for trefle.io.

## Installation

```bash
composer require vkollin/trefle-php-client
```

## Usage

```php
$trefleClient = TrefleClient::create('your-token');

// get a specific species
$sunflowerSpecies = $trefleClient->getSpecies('helianthus-annuus')->getSpecies();

// get a specific plant
$sunflowerPlant = $trefleClient->getPlant('helianthus-annuus')->getPlant();

// search for species matching a query
$searchRequest = (new SearchRequest())->setQuery('oak')->setLimit(5);

$searchResults = $trefleClient->searchSpecies($searchRequest)->getSpecies();
```

## Implemented endpoints

### Species

- [ ] [List species](https://docs.trefle.io/reference#tag/Species/operation/listSpecies)
- [x] [Retrieve a species](https://docs.trefle.io/reference#tag/Species/operation/getSpecies)
- [ ] [Search for species](https://docs.trefle.io/reference#tag/Species/operation/searchSpecies) _(only query parameters and limit is implemented at the moment, but no filters)_
- [ ] [Report an error](https://docs.trefle.io/reference#tag/Species/operation/reportSpecies)

### Plants

- [ ] [List plants](https://docs.trefle.io/reference#tag/Plants/operation/listPlants)
- [x] [Retrieve a plant](https://docs.trefle.io/reference#tag/Plants/operation/getPlant)
- [ ] [Search for a plant](https://docs.trefle.io/reference#tag/Plants/operation/searchPlants)
- [ ] [Report an error](https://docs.trefle.io/reference#tag/Plants/operation/reportPlants)
- [ ] [List plants in a distribution zone](https://docs.trefle.io/reference#tag/Plants/operation/listPlantsZone)
- [ ] [List plants of a genus](https://docs.trefle.io/reference#tag/Plants/operation/listPlantsGenus)

### Genus

- [ ] [Search genus](https://docs.trefle.io/reference#tag/Genus/operation/listGenus)
- [ ] [Retrieve a genus](https://docs.trefle.io/reference#tag/Genus/operation/getGenus)

### Families

- [ ] [Search families](https://docs.trefle.io/reference#tag/Families/operation/listFamilies)
- [ ] [Retrieve a family](https://docs.trefle.io/reference#tag/Families/operation/getFamily)

### DivisionOrders

- [ ] [Search division orders](https://docs.trefle.io/reference#tag/DivisionOrders/operation/listDivisionOrders)
- [ ] [Retrieve a division order](https://docs.trefle.io/reference#tag/DivisionOrders/operation/getDivisionOrder)

### DivisionClasses

- [ ] [Search division classes](https://docs.trefle.io/reference#tag/DivisionClasses/operation/listDivisionClasses)
- [ ] [Retrieve a division class](https://docs.trefle.io/reference#tag/DivisionClasses/operation/getDivisionClass)

### Divisions

- [ ] [Search divisions](https://docs.trefle.io/reference#tag/Divisions/operation/listDivisions)
- [ ] [Retrieve a division](https://docs.trefle.io/reference#tag/Divisions/operation/getDivision)

### Subkingdoms

- [ ] [Search subkingdoms](https://docs.trefle.io/reference#tag/Subkingdoms/operation/listSubkingdoms)
- [ ] [Retrieve a subkingdom](https://docs.trefle.io/reference#tag/Subkingdoms/operation/getSubkingdom)

### Kingdoms

- [ ] [Search kingdoms](https://docs.trefle.io/reference#tag/Kingdoms/operation/listKingdoms)
- [ ] [Retrieve a kingdom](https://docs.trefle.io/reference#tag/Kingdoms/operation/getKingdom)