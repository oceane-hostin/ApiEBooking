# Api EBooking  

## Manage the housing object  
* Get all (GET) : /housing/read/  
Return json like :  
```
[  
   {  
        "id": 1,  
        "name": "Petit Châlet à la montagne",  
        "description": "Logement remis à neuf. Bien situé. Quartier calme.",  
        "address": "87, boulevard de Prague 93160 NOISY-LE-GRAND",  
        "price_per_day": 35,  
        "surface_area": 50,  
        "number_of_travellers": 4,  
        "number_of_bedrooms": 2,  
        "number_of_bed": 2,  
        "number_of_bathrooms": 2,
        "person": { ... }  
    }  
]  
```

* Get one (GET) : /housing/read/id/{id}  
Return json like :  
```
{  
    "id": 1,  
    "name": "Petit Châlet à la montagne",  
    "description": "Logement remis à neuf. Bien situé. Quartier calme.",  
    "address": "87, boulevard de Prague 93160 NOISY-LE-GRAND",  
    "price_per_day": 35,  
    "surface_area": 50,  
    "number_of_travellers": 4,  
    "number_of_bedrooms": 2,  
    "number_of_bed": 2,  
    "number_of_bathrooms": 2,
    "person": { ... }  
} 
```

* Create (POST) : /housing/create  
With body row json like :  
```
{  
    "name": "Petit Châlet à la montagne",  
    "description": "Logement remis à neuf. Bien situé. Quartier calme.",  
    "address": "87, boulevard de Prague 93160 NOISY-LE-GRAND",  
    "price_per_day": 35,  
    "surface_area": 50,  
    "number_of_travellers": 4,  
    "number_of_bedrooms": 2,  
    "number_of_bed": 2,  
    "number_of_bathrooms": 2,
    "person" : {
    	"id" : 1
    }
}   
```

* Update (PUT) : /housing/update/{id}  
With body form-data like : 
```
{  
    "name": "Petit Châlet à la montagne",  
    "description": "Logement remis à neuf. Bien situé. Quartier calme.",  
    "address": "87, boulevard de Prague 93160 NOISY-LE-GRAND",  
    "price_per_day": 35,  
    "surface_area": 50,  
    "number_of_travellers": 4,  
    "number_of_bedrooms": 2,  
    "number_of_bed": 2,  
    "number_of_bathrooms": 2
}  
```

* Delete (DELETE): housing/delete/{id}


## Manage people  
* Get all (GET) : /person/read/  
Return json like :  
```
[
    {
        "id": 1,
        "first_name": "Jane",
        "last_name": "Doe",
        "email": "jane.doe@gmail.com",
        "password": "123",
        "date_of_birth": "1990-02-02T00:00:00+01:00",
        "is_admin": false,
        "housings": [ ... ]
    }
]
```

* Get one (GET) : /person/read/id/{id}  
Return json like :  
```
{  
    "id": 1,  
    "name": "Petit Châlet à la montagne",  
    "description": "Logement remis à neuf. Bien situé. Quartier calme.",  
    "address": "87, boulevard de Prague 93160 NOISY-LE-GRAND",  
    "price_per_day": 35,  
    "surface_area": 50,  
    "number_of_travellers": 4,  
    "number_of_bedrooms": 2,  
    "number_of_bed": 2,  
    "number_of_bathrooms": 2  
} 
```

* Create (POST) : /person/create  
With body row json like :  
```
{
    "first_name": "Jane",
    "last_name": "Doe",
    "email": "jane.doe@gmail.com",
    "password": "123",
    "date_of_birth": "1990-02-02T00:00:00+01:00",
    "is_admin": false
}   
```

* Update (PUT) : /person/update/{id}  
With body form-data like : 
```
{
    "first_name": "John",
    "last_name": "Doe",
    "email": "jane.doe@gmail.com",
    "password": "123",
    "date_of_birth": "1990-02-02T00:00:00+01:00",
    "is_admin": false
}  
```

* Delete (DELETE): person/delete/{id}