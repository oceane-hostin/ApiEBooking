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
        "street": "87, boulevard de Prague ",
        "city": "Noisy Le Grand",
        "zip_code": "93160",
        "country": "France",
        "price_per_day": 35,  
        "surface_area": 50,  
        "number_of_travellers": 4,  
        "number_of_bedrooms": 2,  
        "number_of_bed": 2,  
        "number_of_bathrooms": 2,
        "created_at": "2020-02-17T18:47:09+01:00",
        "updated_at": "2020-02-17T18:49:08+01:00",
        "person": { ... },  
        "images": { ... }
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
    "street": "87, boulevard de Prague ",
    "city": "Noisy Le Grand",
    "zip_code": "93160",
    "country": "France",
    "price_per_day": 35,  
    "surface_area": 50,  
    "number_of_travellers": 4,  
    "number_of_bedrooms": 2,  
    "number_of_bed": 2,  
    "number_of_bathrooms": 2,
    "created_at": "2020-02-17T18:47:09+01:00",
    "updated_at": "2020-02-17T18:49:08+01:00",
    "person": { ... },  
    "images": { ... }
} 
```

* Create (POST) : /housing/create  
With body row json like :  
```
{  
    "name": "Petit Châlet à la montagne",  
    "description": "Logement remis à neuf. Bien situé. Quartier calme.",  
    "street": "87, boulevard de Prague ",
    "city": "Noisy Le Grand",
    "zip_code": "93160",
    "country": "France",
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
With body row json like : 
```
{  
    "name": "Petit Châlet à la montagne",  
    "description": "Logement remis à neuf. Bien situé. Quartier calme.",  
    "street": "87, boulevard de Prague ",
    "city": "Noisy Le Grand",
    "zip_code": "93160",
    "country": "France",
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
        "created_at": "2020-02-17T18:47:09+01:00",
        "updated_at": "2020-02-17T18:49:08+01:00",
        "housings": [ ... ]
    }
]
```

* Get one (GET) : /person/read/id/{id}  
Return json like :  
```
{
    "id": 1,
    "first_name": "Jane",
    "last_name": "Doe",
    "email": "jane.doe@gmail.com",
    "password": "123",
    "date_of_birth": "1990-02-02T00:00:00+01:00",
    "is_admin": false,
    "created_at": "2020-02-17T18:47:09+01:00",
    "updated_at": "2020-02-17T18:49:08+01:00",
    "housings": [ ... ]
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
With body row json like : 
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


* Manage Connection (POST) : person/connect  
With body row json like :  
```
{
    "email" : "janedoe@gmail.com", 
    "password" : "123"
}
```

## Manage booking  
* Get person's booking (GET) : /booking/read/person_id/{id}  
Return json like :  
```
[
    {
        "id": 1,
        "beginning_date": "2020-02-11T00:00:00+01:00",
        "ending_date": "2020-02-21T00:00:00+01:00",
        "housing": { ... },
        "person": { ... },
        "is_confirmed": false,
        "created_at": "2020-02-17T00:00:00+01:00",
        "updated_at": "2020-02-17T00:00:00+01:00"
    }
]
```

* Get housing's booking (GET) : /booking/read/housing_id/{id}  
Return json like :  
```
[
    {
        "id": 1,
        "beginning_date": "2020-02-11T00:00:00+01:00",
        "ending_date": "2020-02-21T00:00:00+01:00",
        "housing": { ... },
        "person": { ... },
        "is_confirmed": false,
        "created_at": "2020-02-17T00:00:00+01:00",
        "updated_at": "2020-02-17T00:00:00+01:00"
    }
]
```

* Get one (GET) : /booking/read/id/{id}  
Return json like :  
```
{
    "id": 1,
    "beginning_date": "2020-02-11T00:00:00+01:00",
    "ending_date": "2020-02-21T00:00:00+01:00",
    "housing": { ... },
    "person": { ... },
    "is_confirmed": false,
    "created_at": "2020-02-17T00:00:00+01:00",
    "updated_at": "2020-02-17T00:00:00+01:00"
}
```

* Create (POST) : /booking/create  
With body row json like :  
```
{  
    "beginning_date": "2020-02-11T00:00:00+01:00",
    "ending_date": "2020-02-18T00:00:00+01:00",
    "housing" : {
    	"id": 2
    },
    "person": {
    	"id": 2
    }
}   
```

* Confirm : /booking/confirm/{id}  

* Delete (DELETE): booking/delete/{id}