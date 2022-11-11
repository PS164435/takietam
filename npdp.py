from typing import List
from collections.abc import Callable

class TreeNode:
    value: any
    children: List['TreeNode']

    def __init__(self, value) -> None:
        self.value = value
        self.children = None

    def is_leaf(self) -> bool:
        return self.children is None

    def add(self, child: 'TreeNode') -> None:
        self.children = child

    def for_each_deep_first(self, visit: Callable[['TreeNode'], None]) -> None:
        print(Callable)


    def for_each_level_order(self, visit: Callable[['TreeNode'], None]) -> None:
        self.visit
        self.child.for_each_level_order()

    def __str__(self):
        return str(self.value)

class Tree:
    root: TreeNode

    def __init__(self, root) -> None:
        self.root = None

   # def add(value: Any, parent_name: Any) -> None:

      #  root.children.value = value


tn1 = TreeNode(11)
print(tn1)
print(tn1.children)
print(tn1.is_leaf())
tn1.add(TreeNode(21))
print(tn1.children)
tn1.add(TreeNode(22))
print(tn1.children)
print(tn1.is_leaf())
tn1.children.add(TreeNode(31))
print(tn1.children.children)

tn1.for_each_deep_first(Callable[tn1])
