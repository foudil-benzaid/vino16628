/**
 * @file Script contenant les fonctions de base
 * @author Jonathan Martel (jmartel@cmaisonneuve.qc.ca)
 * @version 0.1
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */

// const BaseURL = "http://vino.jonathanmartel.info/";
const BaseURL = document.baseURI;
console.log(BaseURL);

// Fonction d'affichage du toggle
function toggle() {
  document.getElementById("myDropdown").classList.toggle("show");
}
window.addEventListener('load', function() {
    // console.log("load");
    document.querySelectorAll(".btnBoire").forEach(function(element){
        // console.log(element);
        element.addEventListener("click", function(evt){
          console.log('boire');
            let id = evt.target.parentElement.dataset.id;
            console.log(id);
            let requete = new Request("index.php?requete=boireBouteilleCellier", {method: 'POST', body: '{"id": '+id+'}'});

            fetch(requete)
            .then(response => {
                if (response.status === 200) {
                  return response.json();
                } else {
                  throw new Error('Erreur');
                }
              })
              .then(response => {
                console.debug(response);
                // Stocker dans une variable le paragraphe 'Quantité' identifié par l'id bouteille
                let quantite = document.getElementById('item'+id);

                // Afficher la quantité retournée par la requête en l'injectant dans le paragraphe qu'elle appartienne
                quantite.innerHTML = 'Quantité : '+ response.quantite;
              }).catch(error => {
                console.error(error);
              });
        })

    });

    document.querySelectorAll(".btnAjouter").forEach(function(element){
        console.log(element);
        element.addEventListener("click", function(evt){
            let id = evt.target.parentElement.dataset.id;
            let requete = new Request("index.php?requete=ajouterBouteilleCellier", {method: 'POST', body: '{"id": '+id+'}'});

            fetch(requete)
            .then(response => {
                if (response.status === 200) {
                  return response.json();
                } else {
                  throw new Error('Erreur');
                }
              })
              .then(response => {
                console.debug(response);
                // Stocker dans une variable le paragraphe 'Quantité' identifié par l'id bouteille
                let quantite = document.getElementById('item'+id);
                // Afficher la quantité retournée par la requête en l'injectant dans le paragraphe qu'elle appartient
                quantite.innerHTML = 'Quantité : '+ response.quantite;
              }).catch(error => {
                console.error(error);
              });
        })

    });
    
    
    
    /*=================================================================*
    =               Retrait d'une bouteille dans un cellier            =
    ===================================================================*/
    
    document.querySelectorAll(".btnRetirer").forEach(function(element){
        console.log(element);
        element.addEventListener("click", function(evt){
          // Boite de dialogue 
          if ( confirm( "Voulez-vous retirer cette bouteille du cellier ?" ) ) {
            // Si l'usager clique sur OK           
            let id = evt.target.parentElement.dataset.id;
            let requete = new Request("index.php?requete=retirerBouteilleCellier", {method: 'POST', body: '{"id": '+id+'}'});

            fetch(requete)
            .then(response => {
                if (response.status === 200) {
                  return response;
                } else {
                  throw new Error('Erreur');
                }
              })
              .then(response => {
                console.debug(response);
                console.log('retrait');
                window.location = "index.php?requete=CellierParUsager";
                
              }).catch(error => {
                console.error(error);
              });
          } 

        })

    });



    

    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight){
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        } 
      });
    }

    
    // Méthode d'affichage du toogle
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }

    document.getElementById("btnDown").addEventListener("click", function(evt){
      toggle();
      
    });

    /*=============================================
    =       Fonction Ajax détails bouteille       =
    =============================================*/
    var select = document.getElementById('bouteille');
    if (select != null) {
      // statement
    
      select.addEventListener("change", function(evt){
            // let id = evt.target.parentElement.dataset.id;
            let id = document.getElementById('bouteille').value;

            console.log(id);
            let requete = new Request("index.php?requete=bouteilleParId", {method: 'POST', body: '{"id": '+id+'}'});

            fetch(requete)
            .then(response => {
                if (response.status === 200) {
                  return response.json();
                } else {
                  throw new Error('Erreur');
                }
              })
              .then(response => {
                console.debug(response);
                document.getElementById('nom').value = response.nom;
                document.getElementById('millesime').value = response.millesime;
                document.getElementById('format').value = response.format;
                document.getElementById('garde_jusqua').value = response.garde_jusqua;
                document.getElementById('prix').value = response.prix_saq;
                document.getElementById('pays').value = response.pays;
                document.getElementById('description').value = response.description;
                document.getElementById('nom').value = response.nom;

              }).catch(error => {
                console.error(error);
              });
        })
      }

    
    
    
    /*=====  Fin de la fonction Ajax  ======*/
    

   
    // document.querySelectorAll(".lienCellier").forEach(function(element){
        
    //     element.addEventListener("click", function(evt){
    //       console.log(element);
    //        var coll = document.getElementsByClassName("collapsible");
    // var i;

    // for (i = 0; i < coll.length; i++) {
    //   coll[i].addEventListener("click", function() {
    //     this.classList.toggle("active");
    //     var content = this.nextElementSibling;
    //     if (content.style.maxHeight){
    //       content.style.maxHeight = null;
    //     } else {
    //       content.style.maxHeight = content.scrollHeight + "px";
    //     } 
    //   });
    // }

    
    // // Méthode d'affichage du toogle
    // window.onclick = function(event) {
    //   if (!event.target.matches('.dropbtn')) {
    //     var dropdowns = document.getElementsByClassName("dropdown-content");
    //     var i;
    //     for (i = 0; i < dropdowns.length; i++) {
    //       var openDropdown = dropdowns[i];
    //       if (openDropdown.classList.contains('show')) {
    //         openDropdown.classList.remove('show');
    //       }
    //     }
    //   }
    // }
           
    //     })

    // });

    
    // document.querySelectorAll(".lienCellier").forEach(function(element){
        
    //     element.addEventListener("click", function(evt){
    //         console.log(element);
    //         let id = evt.target.parentElement.dataset.id;
    //         console.log(id);
    //         let requete = new Request("index.php?requete=cellierParid", {method: 'POST', body: '{"id": '+id+'}'});

    //         fetch(requete)
    //         .then(response => {
    //             if (response.status === 200) {
    //               return response.json();
    //             } else {
    //               throw new Error('Erreur');
    //             }
    //           })
    //           .then(response => {
    //             console.debug(response);
    //             let cellier = document.getElementById('monCellier');
    //             // Afficher la quantité retournée par la requête en l'injectant dans le paragraphe qu'elle appartient
    //             cellier.innerHTML = response.nom;
    //           }).catch(error => {
    //             console.error(error);
    //           });
    //     })

    // });

    // Importer des bouteilles dans la table vino_saq
    document.getElementById("btnImport").addEventListener("click", function(evt){
        console.log('importation');
        let nombre = document.getElementById("nombre").value;
        let debut = document.getElementById("debut").value;

        let requete = new Request("index.php?requete=importer", {method: 'POST', body: 'nombre='+nombre+'&debut='+debut
      });

      fetch(requete)
      .then(response => {
          if (response.status === 200) {
            return response.json();
          } else {
            throw new Error('Erreur');
          }
        })
        .then(response => {
          console.debug(response);
          alert("L'importation est effectuée avec succès !")
        }).catch(error => {
          console.error(error);
        });
    });


     // Selection de tous les boutons modifier
    document.querySelectorAll(".btnModifier").forEach(function(element){

      element.addEventListener("click", function(evt){
        let id = evt.target.parentElement.dataset.id;
        // Faire une redirection vers la page de modification 
        window.location = "index.php?requete=modifierBouteilleCellier&id="+id;
      })

    });
    

    });
       
    let inputNomBouteille = document.querySelector("[name='nom_bouteille']");
    
    let liste = document.querySelector('.listeAutoComplete');

    if(inputNomBouteille){
      inputNomBouteille.addEventListener("keyup", function(evt){
        console.log(evt);
        let nom = inputNomBouteille.value;
        liste.innerHTML = "";
        if(nom){
          let requete = new Request(BaseURL+"index.php?requete=autocompleteBouteille", {method: 'POST', body: '{"nom": "'+nom+'"}'});
          fetch(requete)
              .then(response => {
                  if (response.status === 200) {
                    return response.json();
                  } else {
                    throw new Error('Erreur');
                  }
                })
                .then(response => {
                  console.log(response);
                  
                 
                  response.forEach(function(element){
                    liste.innerHTML += "<li data-id='"+element.id +"'>"+element.nom+"</li>";
                  })
                }).catch(error => {
                  console.error(error);
                });
        }
        
        
      });

      let bouteille = {
        nom : document.querySelector(".nom_bouteille"),
        millesime : document.querySelector("[name='millesime']"),
        quantite : document.querySelector("[name='quantite']"),
        date_achat : document.querySelector("[name='date_achat']"),
        prix : document.querySelector("[name='prix']"),
        garde_jusqua : document.querySelector("[name='garde_jusqua']"),
        notes : document.querySelector("[name='notes']"),
      };


      liste.addEventListener("click", function(evt){
        console.dir(evt.target)
        if(evt.target.tagName == "LI"){
          bouteille.nom.dataset.id = evt.target.dataset.id;
          bouteille.nom.innerHTML = evt.target.innerHTML;
          
          liste.innerHTML = "";
          inputNomBouteille.value = "";

        }
      });



   

      let btnAjouter = document.querySelector("[name='ajouterBouteilleCellier']");
      if(btnAjouter){
        btnAjouter.addEventListener("click", function(evt){
          var param = {
            "id_bouteille":bouteille.nom.dataset.id,
            "date_achat":bouteille.date_achat.value,
            "garde_jusqua":bouteille.garde_jusqua.value,
            "notes":bouteille.date_achat.value,
            "prix":bouteille.prix.value,
            "quantite":bouteille.quantite.value,
            "millesime":bouteille.millesime.value,
          };
          let requete = new Request(BaseURL+"index.php?requete=ajouterNouvelleBouteilleCellier", {method: 'POST', body: JSON.stringify(param)});
            fetch(requete)
                .then(response => {
                    if (response.status === 200) {
                      return response.json();
                    } else {
                      throw new Error('Erreur');
                    }
                  })
                  .then(response => {
                    console.log(response);
                  
                  }).catch(error => {
                    console.error(error);
                  });
        
        });
      } 


  }

    



