<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModelResource\Pages;
use App\Filament\Resources\ModelResource\RelationManagers;
use App\Models\Model;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModelResource extends Resource
{
    protected static ?string $model = Model::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                Builder::make("contents")
                    ->blocks([
                        Builder\Block::make('banner')
                            ->schema([
                                TextInput::make('content')
                                    ->label('Title')
                                    ->required(),
                                FileUpload::make('url')
                                    ->label('Image')
                                    ->image()
                                    ->required(),
                            ])
                            ->columns(2)
                            ->icon("heroicon-s-rectangle-group"),
                        Builder\Block::make('heading')
                            ->schema([
                                TextInput::make('content')
                                    ->label('Heading')
                                    ->required(),
                                Select::make('level')
                                    ->options([
                                        'h1' => 'Heading 1',
                                        'h2' => 'Heading 2',
                                        'h3' => 'Heading 3',
                                        'h4' => 'Heading 4',
                                        'h5' => 'Heading 5',
                                        'h6' => 'Heading 6',
                                    ])
                                    ->required(),
                            ])
                            ->columns(2)
                            ->icon("heroicon-s-h1"),
                        Builder\Block::make('collapse')
                            ->schema([
                                TextInput::make('content')
                                    ->label('Title')
                                    ->required(),
                                Repeater::make('list')
                                    ->schema([
                                        TextInput::make('content')
                                            ->label('Title')
                                            ->required(),
                                        TextInput::make('content')
                                            ->label('Description')
                                            ->required(),
                                    ])
                                    ->columns(2)

                            ])
                            ->icon("heroicon-s-numbered-list"),
                        Builder\Block::make('paragraph')
                            ->schema([
                                Textarea::make('content')
                                    ->label('Paragraph')
                                    ->required(),
                            ])
                            ->icon("heroicon-s-bars-3-bottom-left"),
                        Builder\Block::make('galery')
                            ->schema([
                                TextInput::make('content')
                                    ->label("Title")
                                    ->required(),
                                FileUpload::make('url')
                                    ->label('Image')
                                    ->multiple()
                                    ->required(),
                            ])
                            ->columns(1)
                            ->icon("heroicon-s-view-columns"),
                        Builder\Block::make('image')
                            ->schema([
                                FileUpload::make('url')
                                    ->label('Image')
                                    ->image()
                                    ->required(),
                                TextInput::make('alt')
                                    ->label('Alt text')
                                    ->required(),
                            ])
                            ->icon("heroicon-s-photo"),
                    ])
                    ->collapsed()
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListModels::route('/'),
            'create' => Pages\CreateModel::route('/create'),
            'edit' => Pages\EditModel::route('/{record}/edit'),
        ];
    }
}
