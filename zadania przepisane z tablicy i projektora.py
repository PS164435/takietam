class Car:
    performance: float
    max_fuel_level: float
    current_fuel_level: float

    def __init__(self, performance: float, max_fuel_level: float, current_fuel_level: float):
        self.performance = performance
        self.max_fuel_level = max_fuel_level
        self.current_fuel_level = current_fuel_level

# -------

class SodaCan:
    h: float
    r: float
    def __init__(self, h: float, r: float):
        self.h = h
        self.r = r
