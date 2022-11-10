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
        visit(self)
        visit(self.children)

    def __str__(self):
        return str(self.value)

class Tree:
    root: TreeNode

    def __init__(self, root) -> None:
        self.root = None

   # def add(value: Any, parent_name: Any) -> None:

      #  root.children.value = value


tn1 = TreeNode(12)
print(tn1)
print(tn1.children)
tn1.add(TreeNode(13))
print(tn1.children)
tn1.add(TreeNode(13))
print(tn1.children)





