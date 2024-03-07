<?php

namespace App\Controller\Admin;

use App\Entity\Recipes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RecipesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recipes::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('recipe_title', 'Titre');
        yield TextField::new('recipe_description', 'Description');
        yield TextareaField::new('imageFile', 'Image')->setFormType(VichImageType::class)->hideOnIndex();
        yield IntegerField::new('recipe_prep_duration', 'Temps de préparation');
        yield IntegerField::new('recipe_rest_duration','Temps de repos');
        yield IntegerField::new('recipe_cook_duration','Temps de cuisson');
        yield TextEditorField::new('recipe_ingredient', 'Ingrédients');
        yield TextEditorField::new('recipe_step', 'Etapes');
        yield BooleanField::new('recipe_is_public', 'Recette publique?');

        yield AssociationField::new('recipe_diets', 'Régimes');
        yield AssociationField::new('recipe_allergens', 'Allergènes');
    }
}
