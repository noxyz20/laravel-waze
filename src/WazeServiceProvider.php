<?php

namespace Noxyz20\LaravelWaze;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;


class WazeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-waze')
            ->hasConfigFile()
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishAssets()
                    ->copyAndRegisterServiceProviderInApp()
                    //->askToStarRepoOnGitHub()
                    ;
            });
    }
}