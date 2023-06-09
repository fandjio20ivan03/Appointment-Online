// import { Injectable } from '@angular/core';

// @Injectable({
//   providedIn: 'root'
// })
// export class RendezVousService {

//   constructor() { }
// }

import { Injectable } from '@angular/core';
import { FirebaseService } from './firebase.service';
import { CalendarEvent } from 'angular-calendar';
import { startOfDay, endOfDay } from 'date-fns';

@Injectable({
  providedIn: 'root'
})
export class RendezVousService {

  constructor(private firebaseService: FirebaseService) { }

  getPlagesHoraires(medecinId: string): CalendarEvent[] {
    // retourne un tableau des plages horaires d'un médecin sous forme d'événements du calendrier
    let plagesHoraires: CalendarEvent[] = [];
    // à compléter avec la logique pour récupérer les plages horaires depuis la base de données
    return plagesHoraires;
  }

  getHeuresLibres(date: Date): CalendarEvent[] {
    // retourne un tableau des heures libres parmi les plages horaires des médecins sous forme d'événements du calendrier
    let heuresLibres: CalendarEvent[] = [];
    // à compléter avec la logique pour comparer les plages horaires et les rendez-vous existants
    return heuresLibres;
  }

  selectMedecin(): any {
    // retourne le médecin qui a le moins de rendez-vous parmi les médecins disponibles
    let medecin: any = null;
    // à compléter avec la logique pour compter le nombre de rendez-vous de chaque médecin et choisir le minimum
    return medecin;
  }

  validateRendezVous(formulaire: any): boolean {
    // valide les données du formulaire de prise de rendez-vous et retourne true si elles sont valides, false sinon
    let valide: boolean = true;
    // à compléter avec la logique pour vérifier que les données du formulaire sont cohérentes et respectent les contraintes
    return valide;
  }

}
