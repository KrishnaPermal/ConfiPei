<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    <h2>Récapitulatif de la commande</h2>
    <ul><li>
        <p>Bonjour<b>{{$contact['name']}}</b>votre commande a bien été passé, votre paiement est en attente.</p>
    <p>Veuillez trouver ci-dessous le récapitulatif de votre commande</p> </li>
            <li>
                <b>Récapitulatif de la commande: </b>
                <table>
                    @foreach($contact['commande']['products'] as $products)
                    <tbody>
                        <tr>
                            <td>{{$products->name}}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->photo}}</td>
                            <td>{{$products->quantity}}</td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <h1>Prix total : <b>{{$contact['prix_total']}}</b></h1>
                <b>Adresse de livraison:</b>
                <table>
                    <tbody>
                        <tr>
                            <td>
                            Pays:{{$contact['adresse_livraison']['country']}}
                        </td>
                        <td>
                            Adresse:{{$contact['adresse_livraison']['address']}}
                        </td>
                        <td>
                            Ville:{{$contact['adresse_livraison']['city']}}
                        </td>
                        <td>
                            Code Postal:{{$contact['adresse_livraison']['postal_code']}}
                        </td>
                        </tr>
                    </tbody>
                </table>
                <b>Adresse de facturation:</b>
                <table>
                    <tbody>
                        <tr>
                            <td>
                            Pays:{{$contact['adresse_facturation']['country']}}
                        </td>
                        <td>
                            Adresse:{{$contact['adresse_facturation']['address']}}
                        </td>
                        <td>

                            Ville:{{$contact['adresse_facturation']['city']}}
                        </td>
                        <td>
                            Code Postal:{{$contact['adresse_facturation']['postal_code']}}
                        </td>
                        </tr>
                    </tbody>
                </table>
</body>
</html>


<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Prise de contact sur mon beau site</h2>
    <p>Réception d'une prise de contact avec les éléments suivants :</p>
    <ul>
      <li><strong>Nom</strong> : {{ $contact['name'] }}</li>
    </ul>
  </body>
</html>