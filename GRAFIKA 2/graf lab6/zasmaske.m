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
## @deftypefn {} {@var{retval} =} zasmaske (@var{input1}, @var{input2})
##
## @seealso{}
## @end deftypefn

## Author: Jacek <Jacek@DESKTOP-50EU0VR>
## Created: 2024-01-04




% funkcja do używania maski na obiektach
% obiektem może byc zarówno obrazek (macierz 3-wymiarowa) lub zwykła macierz 2-wymiarowa
% funkcja działa tylko na masce 3x3
function wyjscie = zasmaske(obr, maska)
wyjscie = obr;
for n = 1:size(obr,3)
r = obr(:,:,n);
r2 = zeros(size(r,1)+2,size(r,2)+2);
r2(2:end-1, 2:end-1) = r;
r2(1,:) = r2(2,:);
r2(end,:) = r2(end-1,:);
r2(:,1) = r2(:,2);
r2(:,end) = r2(:,end-1);
r3 = zeros(size(r));
for i = (-1:1)
for j = (-1:1)
r3 += r2(2+i:end-1+i, 2+j:end-1+j)*maska(i+2,j+2);
end
end
wyjscie(:,:,n)=r3;
end
endfunction
