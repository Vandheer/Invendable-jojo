@extends('template.skeleton')

@section('title')
Aide et FAQ
@stop

@section('description')
Consultez notre Foire Aux Questions, une aide pour vous accompagner sur le site.
@stop

@section('keywords')
aide, faq, navigation, question, réponse
@stop

@section('body')
    
	<section class="container">
        <h1 class="head-title text-center"> Foire Aux Questions </h1>
		
		<div id="sommaire">
			<div class="som" id="">
				<h3><a href="#q1">Déposer une annonce</a></h3>
			</div>
			<div class="som" id="">
				<h3><a href="#q2">Gérer mes annonces</a></h3>
			</div>
			<div class="som" id="">
				<h3><a href="#q3">Consulter des annonces</a></h3>
			</div>
			<div class="som" id="">
				<h3><a href="#q4">Gérer mon compte</a></h3>
			</div>
		</div>
		
		
		<div class="cat" id="q1">
			<h3>Déposer une annonce</h3>
		</div>
		
		
		<div class="som">

			<div class="question">
				<span>Comment publier une annonce ?</span>
			</div>
        
			<div class="reponse">
				<p>Pour publier une annonce, rien de plus facile. Cliquez sur « Déposer une annonce », puis renseignez le questionnaire en respectant bien les informations qui y sont mentionnées. La région à choisir est celle dans laquelle votre bien est à vendre. Ne faites pas d'erreur sur votre adresse email et votre numéro de téléphone, qui permettront aux internautes intéressés de vous joindre.</p>

				<p>D'autre part, choisissez avec soin le titre et le descriptif de votre annonce pour ainsi optimiser votre vente. N'hésitez pas à ajouter des photos pour rendre votre annonce attrayante. Une fois que vous aurez validé ces informations, vous allez recevoir un email vous demandant de confirmer votre annonce.</p>

				<p>Pour cela, il vous faut cliquer sur le lien qui figure dans l'email. Si ce lien ne fonctionnait pas, copiez-le dans la barre d'adresse de votre navigateur. Une fois votre annonce confirmée, elle sera contrôlée dans les 24h, et vous recevrez un email de validation une fois votre annonce en ligne.</p>

				<p>Un compte personnel vous sera automatiquement crée lors de votre dépôt, sauf si votre adresse email correspond déjà à un compte existant.</p>
			</div>
			
		</div>
		
		<div class="som">

			<div class="question">
				<span>Combien coûte le dépôt d'une annonce sur linvendable.fr ?</span>
			</div>
        
			<div class="reponse">
				<p>Déposer une annonce dans linvendable.fr est totalement gratuit.</p>
			</div>
			
		</div>
		
		<div class="som">

			<div class="question">
				<span>Combien de temps mon annonce reste-t-elle en ligne ?</span>
			</div>
        
			<div class="reponse">
				<p>Votre annonce restera trente jours en ligne<!--, période durant laquelle vous pouvez vous-même la supprimer-->. A l'issue de cette période, elle sera automatiquement supprimée.</p>
			</div>
			
		</div>
		
		<div class="som">

			<div class="question">
				<span>Dans quelle région diffuser mon annonce ?</span>
			</div>
        
			<div class="reponse">
				<p>Vous devez diffuser votre annonce dans la région dans laquelle votre bien est à vendre.</p>
			</div>
			
		</div>
		
		<div class="som">

			<div class="question">
				<span>Que mettre dans le texte de mon annonce ?</span>
			</div>
        
			<div class="reponse">
				<p>Dans le texte de votre annonce, décrivez votre produit du mieux possible, afin que l'internaute ait un maximum de détails.</p>
			</div>
			
		</div>
		
		<!--
		<div class="som">

			<div class="question">
				<span>Dois-je faire figurer mon adresse email dans le texte de mon annonce ?</span>
			</div>
        
			<div class="reponse">
				<p></p>
			</div>
			
		</div>
		-->
		
		<div class="som">

			<div class="question">
				<span>Comment insérer des photos dans mon annonce ?</span>
			</div>
        
			<div class="reponse">
				<p>À l'aide du bouton « Sélectionnez une image » qui se trouve dans le formulaire de dépôt d'annonce, vous pouvez ajouter jusqu'à 3 photos. Les photos doivent être au format BMP, JPEG ou PNG.</p>
			</div>
			
		</div>
		
		<!--
		<div class="som">

			<div class="question">
				<span>Puis-je utiliser du code ou des étiquettes HTML dans mon annonce ?</span>
			</div>
        
			<div class="reponse">
				<p>Non, il est impossible d'utiliser du code HTML. Celui-ci sera automatiquement effacé. Cependant, si vous souhaitez ajouter des photos, il vous suffit d'utiliser les champs appropriés dans le formulaire.</p>
			</div>
			
		</div>
		-->
		
		<div class="som">

			<div class="question">
				<span>Pourquoi dois-je donner mon numéro de téléphone alors que je ne veux pas qu'il apparaisse dans l'annonce ?</span>
			</div>
        
			<div class="reponse">
				<p>Même si vous choisissez de ne pas afficher votre numéro de téléphone, nous vous le demandons au cas où nous aurions besoin de vous contacter, par exemple, si vous perdez votre mot de passe ou si votre adresse email ne fonctionne pas.</p>
			</div>
			
		</div>
		
		<div class="som">

			<div class="question">
				<span>Dois-je m'inscrire pour utiliser L'invendable ?</span>
			</div>
        
			<div class="reponse">
				<p>La validation d'une annonce déposée par un particulier entraine automatiquement la création d'un compte personnel. Celui-ci vous permettra de retrouver toutes vos annonces au même endroit en vous connectant sur notre site, grâce à l'e-mail et au mot de passe renseignés lors de votre dépôt.</p>

				<p>Aucune information supplémentaire ne vous sera demandée pour créer ce compte. Seuls vos noms, adresse email et numéro de téléphone restent nécessaires pour le dépôt d'une annonce.</p>
				Veillez à ne pas faire d'erreur.
			</div>
			
		</div>
		
		<div class="som">

			<div class="question">
				<span>Comment confirmer une annonce ?</span>
			</div>
        
			<div class="reponse">
				<p>Pour que votre annonce soit validée, il vous faut cliquer sur le lien qui figure dans l'email de confirmation que vous avez reçu suite à la validation de votre annonce. Si le lien ne fonctionne pas, copiez-le dans la barre d'adresse de votre navigateur. Une fois votre annonce confirmée, elle sera contrôlée dans les 24h, et vous recevrez un email de validation une fois votre annonce en ligne.</p>

				<p>Ce même lien permettra également d'activer votre compte personnel s'il n'est pas déjà actif.</p>
			</div>
			
		</div>
		
		<div class="som">

			<div class="question">
				<span>Que faire si je ne reçois pas l'email de validation ?</span>
			</div>
        
			<div class="reponse">
				<p>L'email de validation permet de vérifier que l'adresse mail que vous nous avez indiquée est bien valable. Si vous n'avez pas reçu cet email, il est possible que l'adresse saisie lors du dépôt d'annonce soit erronée. N'ayant alors pas de trace de votre annonce, nous vous invitons à la rediffuser.</p>
				<p>Il arrive également que certains services de messagerie considèrent le message de confirmation comme un email non sollicité, auquel cas il doit se trouver dans votre dossier « Courrier indésirable ». Nous ne recevrons votre annonce que lorsque vous aurez cliqué sur le lien de confirmation.</p>
			</div>
			
		</div>
		
		
		<div class="cat" id="q2">
			<h3>Gérer mes annonces</h3>
		</div>
		
		
		<div class="som">

			<div class="question">
				<span>Comment retrouver mon annonce ?</span>
			</div>
        
			<div class="reponse">
				<p>Pour retrouver votre annonce, cliquez sur le lien contenu dans l'email que vous avez reçu lors de la mise en ligne de votre annonce.</p>
				<p>Vous pouvez également retrouver toutes vos annonces en vous connectant à votre compte personnel. Pour cela utiliser l'adresse email et le mot de passe renseignés lors de votre dépôt.</p>
			</div>
			
		</div>
		
		<!--
		<div class="som">

			<div class="question">
				<span>Comment modifier mon annonce ?</span>
			</div>
        
			<div class="reponse">
				<p>Pour modifier votre annonce, cliquez sur le lien « Modifier » sur la page de présentation de votre annonce puis connectez-vous en saisissant votre email et mot de passe. Votre annonce sera remontée en tête de liste comme si elle venait d'être publiée.</p>
				<p>Pour retrouver votre annonce, cliquez sur le lien contenu dans l'email que vous avez reçu lors de la mise en ligne de votre annonce. Vous pouvez également retrouver toutes vos annonces en vous connectant à votre compte personnel.</p>
			</div>
			
		</div>
		
		<div class="som">

			<div class="question">
				<span>Comment supprimer mon annonce ?</span>
			</div>
        
			<div class="reponse">
				<p>Pour supprimer une annonce, il vous suffit de cliquer sur le lien « Supprimer » sur la page de votre annonce, et de vous connecter en utilisant votre email et mot de passe.</p>
			</div>
			
		</div>
		
		
		<div class="som">

			<div class="question">
				<span>Que faire si j'ai oublié mon mot de passe ?</span>
			</div>
        
			<div class="reponse">
				<p>Sur la page de connexion à votre compte, cliquez sur le lien « mot de passe oublié ». Votre mot de passe vous sera alors envoyé à l'adresse email correspondant à votre compte.</p></div>
			
		</div>
		-->
		
		
		<div class="cat" id="q3">
			<h3>Consulter des annonces</h3>
		</div>
		
		
		<div class="som">

			<div class="question">
				<span>Comment chercher une annonce ?</span>
			</div>
        
			<div class="reponse">
				<p>Pour chercher une annonce, rien de plus simple. Il suffit de cliquer sur la région dans laquelle vous souhaitez effectuer une recherche. Vous pouvez limiter votre recherche à un type spécifique d'annonces en sélectionnant une catégorie et/ou à une zone géographique précise (votre département, votre région ou toute la France).</p>
			</div>
		</div>
		
		
		<div class="cat" id="q4">
			<h3>Gérer mon compte</h3>
		</div>
		
		
		<div class="som">

			<div class="question">
				<span>Créer un compte :</span>
			</div>
        
			<div class="reponse">
				<p>La création de compte personnel est gratuite et obligatoire pour pouvoir déposer une annonce.</p>
				<p>La création du compte peut se faire depuis l'onglet Se connecter en cliquant sur « S'inscrire », en choisissant si on est un particulier ou un professionnel, ou de manière automatique lors du dépôt de votre annonce.</p>
				<p>Après la création du compte, un mail de confirmation est envoyé. Votre compte sera actif une fois le lien présent dans l'email cliqué. Si le lien n'est pas cliqué, votre compte ne sera pas activé. Dans le cas d'une création automatique lors d'un dépôt d'annonce, la validation de celle-ci entraine la création du compte.</p>
				<p>La création de compte ne repousse pas la durée de vie de vos annonces.</p>
			</div>
		</div>
		
		<div class="som">

			<div class="question">
				<span>Entrer dans mon compte :</span>
			</div>
        
			<div class="reponse">
				<p>L'identification au compte peut se faire depuis l'onglet « Se connecter » en haut à droite de chaque page. Une fois authentifié(e), vous avez la possibilité de vous déconnecter de votre compte en cliquant sur « Se déconnecter ».</p>
			</div>
		</div>
		
	</section>

@stop
