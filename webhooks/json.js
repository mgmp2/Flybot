{
    "responseId": "4c024937-2ccb-4e44-a6f0-f757de0dce0f-32138632",
    "queryResult": {
        "queryText": "eeuu",
        "action": "cotizar_seguro.cotizar_seguro-custom",
        "parameters": {
            "destinos": "EEUU y Canad\u00e1"
        },
        "allRequiredParamsPresent": true,
        "fulfillmentText": "Entiendo que deseas cubrir el destino EEUU y Canad\u00e1. \u00bfCu\u00e1ntos adultos y ni\u00f1os deseas asegurar?",
        "fulfillmentMessages": [
            {
                "text": {
                    "text": [
                        "Entiendo que deseas cubrir el destino EEUU y Canad\u00e1. \u00bfCu\u00e1ntos adultos y ni\u00f1os deseas asegurar?"
                    ]
                }
            }
        ],
        "outputContexts": [
            {
                "name": "projects\/chatfly-2d6d8\/agent\/sessions\/236bb47e-ae07-549a-757f-e78e02db0f1d\/contexts\/cotizar_seguro-custom-followup",
                "lifespanCount": 2,
                "parameters": {
                    "destinos": "EEUU y Canad\u00e1",
                    "destinos.original": "eeuu"
                }
            },
            {
                "name": "projects\/chatfly-2d6d8\/agent\/sessions\/236bb47e-ae07-549a-757f-e78e02db0f1d\/contexts\/cotizar_seguro-followup",
                "lifespanCount": 1,
                "parameters": {
                    "destinos": "EEUU y Canad\u00e1",
                    "destinos.original": "eeuu"
                }
            },
            {
                "name": "projects\/chatfly-2d6d8\/agent\/sessions\/236bb47e-ae07-549a-757f-e78e02db0f1d\/contexts\/cotizar_seguro-pasajeros-followup",
                "lifespanCount": 3,
                "parameters": {
                    "cantidad1": 1,
                    "cantidad1.original": "1",
                    "pasajero1": "adulto",
                    "pasajero1.original": "adulto",
                    "cantidad2": 2,
                    "cantidad2.original": "2",
                    "pasajero2": "ni\u00f1o",
                    "pasajero2.original": "ni\u00f1os",
                    "destinos": "EEUU y Canad\u00e1",
                    "destinos.original": "eeuu",
                    "fecha_ida": "2019-05-15T12:00:00-05:00",
                    "fecha_ida.original": "15 de mayo",
                    "fecha_vuelta": "2019-05-30T12:00:00-05:00",
                    "fecha_vuelta.original": "30 de mayo",
                    "email": "miriammp1997@gmail.com",
                    "email.original": "miriammp1997@gmail.com"
                }
            }
        ],
        "intent": {
            "name": "projects\/chatfly-2d6d8\/agent\/intents\/82acaf51-b734-422f-af5e-d870de8deaea",
            "displayName": "cotizar_seguro-destino"
        },
        "intentDetectionConfidence": 1,
        "languageCode": "es"
    },
    "originalDetectIntentRequest": {
        "payload": []
    },
    "session": "projects\/chatfly-2d6d8\/agent\/sessions\/236bb47e-ae07-549a-757f-e78e02db0f1d"
}