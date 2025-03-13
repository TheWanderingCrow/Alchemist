{
  description = "Alchemist flake";

  inputs = {
    nixpkgs.url = "github:NixOS/nixpkgs/nixos-unstable";
    flake-parts.url = "github:hercules-ci/flake-parts";
  };

  outputs = inputs @ {
    self,
    flake-parts,
    ...
  }:
    flake-parts.lib.mkFlake {inherit inputs;} {
      systems = ["x86_64-linux" "aarch64-linux"];

      perSystem = {pkgs, ...}: {
        devShells.default = pkgs.mkShell {
          name = "alchemist";
          packages = with pkgs; [
            php83
            php83Packages.composer
            php83Extensions.zlib
            php83Extensions.uv
            php83Extensions.mbstring
            php83Extensions.sodium
          ];
        };
      };
    };
}
