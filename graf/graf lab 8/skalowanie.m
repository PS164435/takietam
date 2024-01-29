## Copyright (C) 2024 Jacek
##
## This program is free software: you can redistribute it and/or modify
## it under the terms of the GNU General Public License as published by
## the Free Software Foundation, either version 3 of the License, or
## (at your option) any later version.
##
## This program is distributed in the hope that it will be useful,
## but WITHOUT ANY WARRANTY; without even the implied warranty of
## MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
## GNU General Public License for more details.
##
## You should have received a copy of the GNU General Public License
## along with this program.  If not, see <https://www.gnu.org/licenses/>.

## -*- texinfo -*-
## @deftypefn {} {@var{retval} =} skalowanie (@var{input1}, @var{input2})
##
## @seealso{}
## @end deftypefn

## Author: Jacek <Jacek@DESKTOP-50EU0VR>
## Created: 2024-01-04

function [xwe,ywe] = skalowanie(wejscie,swy,wwy)
swe = size(wejscie,2);
wwe = size(wejscie,1);
xwy = 1:swy;
ywy = 1:wwy;
xwe = round(1+(((xwy-1)*(swe-1))/(swy-1)));
ywe = round(1+(((ywy-1)*(wwe-1))/(wwy-1)));
end
