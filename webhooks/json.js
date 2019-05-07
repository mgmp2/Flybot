{
    "responseId": "c6c24c27-7bdf-4380-b516-7d850146d68b-32138632",
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
                "name": "projects\/chatfly-2d6d8\/agent\/sessions\/a473ffe1-5bd9-49b5-e695-e5f57817d65f\/contexts\/cotizar_seguro-custom-followup",
                "lifespanCount": 2,
                "parameters": {
                    "destinos": "EEUU y Canad\u00e1",
                    "destinos.original": "eeuu"
                }
            },
            {
                "name": "projects\/chatfly-2d6d8\/agent\/sessions\/a473ffe1-5bd9-49b5-e695-e5f57817d65f\/contexts\/cotizar_seguro-followup",
                "lifespanCount": 1,
                "parameters": {
                    "destinos": "EEUU y Canad\u00e1",
                    "destinos.original": "eeuu"
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
    "session": "projects\/chatfly-2d6d8\/agent\/sessions\/a473ffe1-5bd9-49b5-e695-e5f57817d65f"
}