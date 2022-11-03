from typing import List

class TreeNode:
    value: any
    children: List['TreeNode']
    rodzic : List['TreeNode']

    def __init__(self, value) -> None:
        self.value = self
        self.children = None
        self.rodzic = None

    def is_leaf(self) -> bool:
        if (self.children == None):
            return True
        return False

    def add(child: 'TreeNode') -> None:
        self.children = TreeNode

    def for_each_deep_first(visit: Callable[['TreeNode'], None]) -> None:
        self.






class Tree:
    root: TreeNode

    def __init__(self,root) -> None:
        self.root = None

    def add(value: Any, parent_name: Any) -> None:

        root.children.value = value





