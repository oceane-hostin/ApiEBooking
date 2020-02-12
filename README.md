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
        "number_of_bathrooms": 2  
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
    "number_of_bathrooms": 2  
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
    "number_of_bathrooms": 2  
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