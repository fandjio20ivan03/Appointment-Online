import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';
import { FormBuilder, FormGroup } from '@angular/forms';

@Component({
  selector: 'app-calendrier-form',
  templateUrl: './calendrier-form.component.html',
  styleUrls: ['./calendrier-form.component.css']
})
export class CalendrierFormComponent implements OnInit {

  // Le formulaire réactif
  calendrierForm: FormGroup;

  constructor(private apiService: ApiService, private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    // Initialise le formulaire réactif avec les champs date et heure
    this.calendrierForm = this.formBuilder.group({
      date: [''],
      heure: ['']
    });
  }

  // Méthode appelée lors du clic sur le bouton Envoyer
  onSubmit() {
    // Récupère les données du formulaire
    const calendrier = this.calendrierForm.value;

    // Appelle la méthode createCalendrier du service ApiService
    this.apiService.createCalendrier(calendrier).subscribe(
      // Affiche le résultat dans la console
      result => console.log(result),
      error => console.log(error)
    );
  }

}
